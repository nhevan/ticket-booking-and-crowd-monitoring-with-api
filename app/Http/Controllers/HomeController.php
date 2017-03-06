<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('is_by_sudo', 0)->orderBy('created_at', 'desc')->paginate(15);
        if (Auth::user()->email == 'nhevan@gmail.com') {
            $tickets = Ticket::orderBy('created_at', 'desc')->paginate(15);
        }
        $total_ticket_count = Ticket::where('is_on_spot', 0)->where('is_by_sudo', 0)->count();
        $total_male =Ticket::where('gender','m')->where('is_by_sudo', 0)->count();
        $total_female =Ticket::where('gender','f')->where('is_by_sudo', 0)->count();
        $is_registration_allowed = Setting::where('setting', 'is_registration_allowed')->first()->value;

        $on_spot_count = Ticket::where('is_on_spot','1')->count();
        $on_spot_male = Ticket::where('is_on_spot','1')->where('gender','m')->count();
        $on_spot_female = Ticket::where('is_on_spot','1')->where('gender','f')->count();
        $male_in_venue = Ticket::where('gender','m')->where('gate_used', '<>', 0)->count();
        $male_in_venue += $on_spot_male;
        $female_in_venue = Ticket::where('gender','f')->where('gate_used', '<>', 0)->count();
        $female_in_venue += $on_spot_female;
        $vip_in_venue = Setting::where('setting', 'total_vip_entered')->first()->value;

        $total_crowd = $male_in_venue + $female_in_venue + $vip_in_venue;

        return view('dashboard', compact('tickets', 'is_registration_allowed', 'total_ticket_count','total_male','total_female', 'on_spot_count', 'male_in_venue', 'female_in_venue', 'vip_in_venue', 'on_spot_male', 'on_spot_female', 'total_crowd'));
    }

    /**
     * Swaps the status of registration process from running to pause
     * @return view [description]
     */
    public function swapRegistrationStatus()
    {
        $is_registration_allowed = Setting::where('setting', 'is_registration_allowed')->first()->value;
        if ($is_registration_allowed) {
            $this->turnOffRegistration();
        }else{
            $this->turnOnRegistration();
        }
        return back();
    }

    /**
     * Turns OFF registration process
     */
    public function turnOffRegistration()
    {
        $setting = Setting::where('setting', 'is_registration_allowed')->first();
        $setting->value = 0;
        $setting->save();
    }

    /**
     * Turns ON registration process
     */
    public function turnOnRegistration()
    {
        $setting = Setting::where('setting', 'is_registration_allowed')->first();
        $setting->value = 1;
        $setting->save();
    }

    /**
     * displays the page for managing passport/API keys
     * @return [type] [description]
     */
    public function passport()
    {
        return view('passport-keys');
    }

    public function isAppAllowed()
    {
        $allow_app_to_turn_on = Setting::where('setting', 'allow_app_to_turn_on')->first()->value;
        if ($allow_app_to_turn_on) {
            return response()->json([
                    'status_code' => 200,
                    'message' => 'App allowed'
                ])->header('Status', 200);
        }
        return response()->json([
                    'status_code' => 420,
                    'message' => 'App NOT allowed'
                ])->header('Status', 420);
    }

}
