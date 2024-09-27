<?php

namespace App\Mail;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AfterRegistration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Bienvenido a FarmaCheck! Comienza tu periodo de prueba hoy',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $date = Carbon::parse($this->user->trial_ends_at);

        $formattedDate = $date->toFormattedDateString();

        return new Content(
            view: 'mails.AfterRegistration',
            with:['expiredDate' => $formattedDate, 'name' => $this->user->name]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
