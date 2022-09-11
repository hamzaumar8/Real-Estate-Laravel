<?php

namespace App\Mail;

use App\Models\Owner;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OwnerInvite extends Mailable
{
    use Queueable, SerializesModels;

    public Owner $owner;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($owner)
    {
        $this->owner = $owner;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Authentication Invitation from Realestate")->markdown('mails.owners.invite');
    }
}