<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token; // token public pour le Blade

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    // Sujet de l’email
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invitation à rejoindre la colocation',
        );
    }

    // Vue de l’email
    public function content(): Content
    {
        return new Content(
            view: 'emails.invitation', 
        );
    }

    public function attachments(): array
    {
        return [];
    }
}