<?php

namespace App\Http\Controllers;

use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG;

class OnSpotRegistrationController extends Controller
{
    
    /**
     * displays the form for on spot registration
     * @return view 
     */         
    public function onSpotRegistration()
    {
        return view('on-spot-registration');
    }

    /**
     * Generates on spot ticket
     * @param  Request $request 
     * @return view           
     */
    public function generateOnSpotTicket(Request $request)
    {
        $this->validateTicketRequest($request);
    }


    /**
     * checks against the rules of tickets fields and throws appropriate validation errrors with custom messages
     * @param  Request $request 
     * @return [type]           [description]
     */
    protected function validateTicketRequest(Request $request)
    {
    	$messages = [
		    'phone.digits' => 'Your mobile number can only be of 11 digits excluding +88.',
		    'phone.unique' => 'This phone number has already been used to request a ticket.',
		];
    	return $this->validate($request, [
    		'name' => 'required',
    		'phone' => 'required|numeric|digits:11|unique:tickets,phone'
		], $messages);
    }
}
