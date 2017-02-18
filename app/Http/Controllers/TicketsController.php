<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Question;
use App\Mail\SendTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
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
    	$this->validateTicketRequest($request);

    	$ticket = new Ticket;

    	$ticket->name = $request->name;
    	$ticket->phone = $request->phone;
    	$ticket->email = $request->email;
    	$ticket->slogan = Crypt::decrypt($request->slogan);
    	$ticket->reg_id = $this->getNextRegId();
    	$ticket->barcode = $this->getBarCode($ticket->reg_id);

		$ticket->save();

    	Mail::to($ticket->email)->queue(new SendTicket($ticket));
		
    	return view('ticket-sent');
    }

    /**
     * checks against the rules of tickets fields and throws appropriate validation errrors with custom messages
     * @param  Request $request 
     * @return [type]           [description]
     */
    protected function validateTicketRequest(Request $request)
    {
    	$messages = [
		    'email.unique' => 'A ticket has already been registered with this email address.',
		    'phone.digits' => 'Your mobile number can only be of 10 digits excluding +880.',
		    'phone.unique' => 'This phone number has already been used to request a ticket.'
		];
    	return $this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email|unique:tickets,email',
    		'phone' => 'required|numeric|digits:10|unique:tickets,phone'
		], $messages);
    }

    /**
     * displays the register visitor page if first answer is right else displays NOT Allowed page
     * @param  Request $request 
     * @return view   
     */
    public function registerVisitor(Request $request)
    {
    	if (!$this->isQuestionFound($request)) {
    		return redirect('/questionnaire');
    	}
    	$question_id = Crypt::decrypt($request->question);
    	$actual_answer = Question::findOrFail($question_id)->right_option;

    	if($request->answer == $actual_answer){
    		return view('register-visitor', ['slogan' => $request->slogan]);
    	}

    	return view('wrong-answer');
    }

    /**
     * checks if the user actually passed the questionnaire page
     * @param  Request $request 
     * @return boolean
     */
    protected function isQuestionFound(Request $request)
    {
    	return $request->question;
    }
}
