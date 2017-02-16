<?php

namespace App\Http\Controllers;

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

    public function generateTicket()
    {
    	Mail::to('nhevan@gmailx.com')->queue(new SendTicket());
		$ticket['slogan'] = 'Amar Shahosh';
		$ticket['reg_id'] = 'YB-20201';
		$ticket['name'] = 'NH Shakil';
		$ticket['phone'] = '01912077825';
		$ticket['email'] = 'shakil@gmail.com';
		$ticket['barcode'] = $this->getBarCode($ticket['reg_id']);


		$pdf = App::make('snappy.pdf.wrapper');
		$pdf->loadView('pdf.ticket', compact('ticket'));
		$pdf->setPaper('a4')->setOption('margin-bottom', '0mm');
		// dd($request->user());
		
		// return "Ticket generated and email sent successfully.";
		return $pdf->inline();
    }
}
