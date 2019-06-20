<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class GuestRsvp extends Mailable
{
    use Queueable, SerializesModels;

    public $email, $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request, $data)
    {
        $this->email = $request;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.rsvp')
            ->from($this->email->email, $this->email->first_name . ' ' . $this->email->last_name)
            ->to($this->data['email'], $this->data['bride_first_name'] . ' ' . $this->data['bride_last_name'] .
             ' & ' . $this->data['groom_first_name'] . ' ' . $this->data['groom_last_name'])
            ->subject('RSVP');
    }
}
