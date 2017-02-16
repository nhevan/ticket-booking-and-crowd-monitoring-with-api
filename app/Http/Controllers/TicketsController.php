<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Mail\SendTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Picqer\Barcode\BarcodeGeneratorPNG;

class TicketsController extends Controller
{

	/**
	 * Generates the barcode with the provided registration id
	 * @param  string $reg_id 
	 * @return base64  base64 representation of the barcode
	 */
	protected function getBarCode($reg_id)
	{
		$generator = new BarcodeGeneratorPNG();
		$barcode = $generator->getBarcode($reg_id, $generator::TYPE_CODE_128, 3, 170);
		
		return base64_encode($barcode);
	}

	/**
	 * generates the next registration id for the ticket
	 * @return string reg_id
	 */
	protected function getNextRegId()
	{
		$reg_id_start_number = 40000;

		$last_ticket_id = Ticket::all()->pluck('id')->last();
	    $reg_code = $reg_id_start_number + $last_ticket_id + 1;
	    $reg_id = 'YB-'.$reg_code;
	    return $reg_id;
	}

	/**
	 * saves the ticket and emails a pdf version to the ticket owner
	 * @param  Request $request 
	 * @return [type]           [description]
	 */
    public function generateTicket(Request $request)
    {
    	$ticket = new Ticket;

    	$ticket->name = $request->name;
    	$ticket->phone = $request->phone;
    	$ticket->email = $request->email;
    	$ticket->slogan = 'Amar Shahosh';
    	$ticket->reg_id = $this->getNextRegId();
    	$ticket->barcode = $this->getBarCode($ticket->reg_id);

		$ticket->save();

    	Mail::to($ticket->email)->queue(new SendTicket($ticket));
		
    	return view('ticket-sent');
    }
}
