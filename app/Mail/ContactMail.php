<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;


class ContactMail extends Mailable
{

    use Queueable, SerializesModels;


    public $contact;
    /**
     * Create a new message instance.
     */
    public function __construct(array $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->contact['email'], $this->contact['name']),

            subject: $this->contact['subject'],
            replyTo: [new Address($this->contact['email'], $this->contact['name'])],

            // from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')),



        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // Log::info('Content contact:', $this->contact);
        return new Content(
            view: 'mail.contact',
            with: [
                'name'      => $this->contact['name'],
                'email'     => $this->contact['email'],
                'subject'   => $this->contact['subject'],
                'messages'   => $this->contact['message']
            ]
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
