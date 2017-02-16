<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\App;
use Illuminate\Queue\SerializesModels;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTicket extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $ticket['gate'] = 420;
        $ticket['slogan'] = 'Amar Shahosh';
        $ticket['reg_id'] = 'YB-20201';
        $ticket['name'] = 'NH Shakil';
        $ticket['phone'] = '01912077825';
        $ticket['email'] = 'shakil@gmail.com';

        $generator = new BarcodeGeneratorPNG();
        $barcode = $generator->getBarcode('Hello', $generator::TYPE_CODE_128, 3, 170);

        $ticket['barcode'] = base64_encode($barcode);

        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('pdf.ticket', compact('ticket'));
        $pdf->setPaper('a4')->setOption('margin-bottom', '0mm');
        // dd($request->user());
        

        $attachment = $pdf->inline();

        return $this->from('example@example.com')
                    ->markdown('mails.sendTicket')
                    ->with([
                        'ticket' => $ticket
                    ])
                    ->attachData($attachment, 'e-ticket.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
