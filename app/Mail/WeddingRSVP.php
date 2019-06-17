<?php

namespace App\Mail;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WeddingRSVP extends Mailable
{
    use Queueable, SerializesModels;

    public $bride_first_name, $bride_last_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $bride_first_name, $bride_last_name)
    {
        $this->bride_first_name = $bride_first_name;
        $this->bride_last_name = $bride_last_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.invitation')
            ->with(['bride_first_name' => $this->bride_first_name, 'bride_last_name' => $this->bride_last_name]);
    }
}
