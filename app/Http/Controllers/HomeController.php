<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Setting;
use Illuminate\Http\Request;

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
        $tickets = Ticket::paginate(15);
        $total_ticket_count = Ticket::count();
        $total_male =Ticket::where('gender','m')->count();
        $total_female =Ticket::where('gender','f')->count();
        $is_registration_allowed = Setting::where('setting', 'is_registration_allowed')->first()->value;
        $allow_female_only = Setting::where('setting', 'allow_female_only')->first()->value;
        return view('dashboard', compact('tickets', 'is_registration_allowed', 'total_ticket_count','total_male','total_female', 'allow_female_only'));
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
     * Swaps the status of female only registration process from running to pause or vice-versa "allow_female_only"
     * @return view [description]
     */
    public function swapFemaleRegistrationStatus()
    {
        $allow_female_only = Setting::where('setting', 'allow_female_only')->first()->value;
        if ($allow_female_only) {
            $this->turnOffFemaleOnlyRegistration();
        }else{
            $this->turnOnFemaleOnlyRegistration();
        }
        return back();
    }

    /**
     * Turns OFF Female only registration
     */
    public function turnOffFemaleOnlyRegistration()
    {
        $setting = Setting::where('setting', 'allow_female_only')->first();
        $setting->value = 0;
        $setting->save();
    }

    /**
     * Turns ON Female only registration
     */
    public function turnOnFemaleOnlyRegistration()
    {
        $setting = Setting::where('setting', 'allow_female_only')->first();
        $setting->value = 1;
        $setting->save();
    }
}
