<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CertificateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;

    public $certificatePath;

    public function __construct($registration, $certificatePath)
    {
        $this->registration = $registration;
        $this->certificatePath = $certificatePath;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sertifikat Event: '.$this->registration->event->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.certificate',
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath(storage_path('app/public/'.$this->certificatePath))
                ->as('Sertifikat_'.str_replace(' ', '_', $this->registration->full_name).'.jpg')
                ->withMime('image/jpeg'),
        ];
    }
}
