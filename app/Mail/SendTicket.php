<?php

namespace App\Mail;

use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\App;
use Illuminate\Queue\SerializesModels;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTicket extends Mailable
{
    use Queueable, SerializesModels;

    protected $ticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket->toArray();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('pdf.ticket', ['ticket' => $this->ticket]);
        $pdf->setPaper('a4')->setOption('margin-bottom', '0mm');

        $attachment = $pdf->inline();

        return $this->from(['address' => 'example@example.com', 'name' => 'Joy Bangla Concert'])
                    ->subject('Your Joy Bangla concert e-Ticket')
                    ->markdown('mails.sendTicket')
                    ->with([
                        'ticket' => $this->ticket
                    ])
                    ->attachData($attachment, 'e-ticket.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
