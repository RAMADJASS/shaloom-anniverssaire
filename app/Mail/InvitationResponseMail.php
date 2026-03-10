<?php

namespace App\Mail;

use App\Models\Invitation;
use Illuminate\Mail\Mailable;

class InvitationResponseMail extends Mailable
{
    public $invitation;

    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
    }

    public function build()
    {
        return $this->subject('📩 Nouvelle participation – Anniversaire Shaloom')
                    ->view('emails.invitation');
    }
}