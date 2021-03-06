<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Setting;
use App\Question;
use GuzzleHttp\Client;
use App\Mail\SendTicket;
use Illuminate\Http\Request;
use App\Jobs\SendTicketEmail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Picqer\Barcode\BarcodeGeneratorPNG;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['check-ticket-quota', 'check-registration-status'],['except' => ['resendTicket', 'downloadTicket']]);
    }


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
        $rnd = rand(80000,990000);
	    $reg_code = $reg_id_start_number + $rnd + 1;
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
        $ticket->nidorpassport = $request->nidorpassport;
        $ticket->dob = $request->dob;
        $ticket->gender = $request->gender;
    	$ticket->slogan = Crypt::decrypt($request->slogan);
    	$ticket->reg_id = $this->getNextRegId();
    	$ticket->barcode = $this->getBarCode($ticket->reg_id);

		$ticket->save();

    	Mail::to($ticket->email)->send(new SendTicket($ticket));
		$this->sendSMS($ticket->phone);

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
		    'phone.digits' => 'Your mobile number can only be of 11 digits excluding +88.',
		    'phone.unique' => 'This phone number has already been used to request a ticket.',
            'nidorpassport.required' => 'Please provide your NID/Passport number.',
            'dob.date' => 'Please enter your date of birth in valid format.',
            'dob.before' => 'You must be 12 years or more to register for this concert'
		];
    	return $this->validate($request, [
    		'name' => 'required',
    		'email' => 'required|email|unique:tickets,email',
    		'phone' => 'required|numeric|digits:11|unique:tickets,phone',
            'dob' => 'required|date|before:-12 years',
            'gender' => 'required',
            'nidorpassport' => 'required'
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

    	if(Crypt::decrypt($request->answer) == $actual_answer){
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

    /**
     * sends a sms to a specific phone number
     * @param  string $phone contains the phone number without the trailing 0
     * @return int        status code
     */
    protected function sendSMS($phone)
    {
    	$client = new Client();
    	$sms_body = "Thank you for registering for Joy Bangla Concert 2017. Bring a printed copy of ticket (sent to your email) and photo ID to the concert.";
		$res = $client->request('POST', 'http://202.51.191.68/bulksms/webrequest/?u_name=flowdl&pass=flowdl321&msisdn=0'.$phone.'&msg_body='.$sms_body.'&msg_in_id=543&msg_option=TEXT');
		
		return $res->getStatusCode();
    }

    /**
     * Resend the ticket to the users email address
     * @param  Ticket $ticket [description]
     * @return [type]         [description]
     */
    public function resendTicket(Ticket $ticket)
    {
        Mail::to($ticket->email)->send(new SendTicket($ticket));

        return back();
    }

    /**
     * Downloads the generated pdf 
     * @param  Ticket $ticket [description]
     * @return [type]         [description]
     */
    public function downloadTicket(Ticket $ticket)
    {
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('pdf.ticket', ['ticket' => $ticket]);
        $pdf->setPaper('a4')->setOption('margin-bottom', '0mm');

        return $pdf->download($ticket->reg_id.'-eTicket.pdf');
    }

}
