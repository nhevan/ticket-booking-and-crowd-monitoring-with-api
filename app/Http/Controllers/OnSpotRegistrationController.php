<?php

namespace App\Http\Controllers;

use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Picqer\Barcode\BarcodeGeneratorPNG;

class OnSpotRegistrationController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    
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

    	$ticket = new Ticket;

    	$ticket->is_on_spot = 1;
    	$ticket->name = $request->name;
    	$ticket->phone = $request->phone;
    	$ticket->email = $request->phone.'@g.co';
        $ticket->nidorpassport = "on spot registration";
        $ticket->dob = Carbon::now('Asia/Dhaka');
        $ticket->gender = $request->gender;
    	$ticket->slogan = 1;

    	$ticket->reg_id = $this->getNextRegId();
    	$ticket->barcode = $this->getBarCode($ticket->reg_id);

		$ticket->save();
		// $request->session()->flash('reg_id', $ticket->reg_id);

		$pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('pdf.ticket', ['ticket' => $ticket]);
        $pdf->setPaper('a4')->setOption('margin-bottom', '0mm');

		return $pdf->download('joy-bangla-'.$ticket->name.'.pdf');
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
	    $reg_id = 'OS-'.$reg_code;
	    return $reg_id;
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
