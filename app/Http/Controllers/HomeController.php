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
        // dd($tickets);

        return view('dashboard', compact('tickets'));
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
}
