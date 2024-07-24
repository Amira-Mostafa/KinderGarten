<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ContactMail extends Mailable
{

    use Queueable, SerializesModels;

    public $contactData;

    public function __construct(array $contact)
    {
        $this->contactData = $contact;
        Log::info('ContactMail constructor', ['contact' => $this->contactData]);
    }

    public function build()
    {
        Log::info('ContactMail build method', ['contactData' => $this->contactData]);

        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject($this->contactData['subject'] ?? 'Contact Form Submission')
            ->view('mail.contact')
            ->with('contactData', $this->contactData);
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
    // use Queueable, SerializesModels;

    // protected $contactData;

    // public function __construct(array $contact)
    // {
    //     $this->contactData = $contact;
    //     Log::info('ContactMail constructor', ['contact' => $this->contactData]);
    // }

    // public function envelope(): Envelope
    // {
    //     Log::info('ContactMail envelope method', ['subject' => $this->contactData['subject'] ?? 'N/A']);
    //     return new Envelope(
    //         subject: $this->contactData['subject'] ?? 'New Contact Form Submission',
    //     );
    // }

    // public function content(): Content
    // {
    //     Log::info('ContactMail content method', ['contactData' => $this->contactData]);
    //     return new Content(
    //         htmlString: '<p>Name: ' . htmlspecialchars($this->contactData['name'] ?? 'N/A') . '</p>' .
    //             '<p>Email: ' . htmlspecialchars($this->contactData['email'] ?? 'N/A') . '</p>' .
    //             '<p>Subject: ' . htmlspecialchars($this->contactData['subject'] ?? 'N/A') . '</p>' .
    //             '<p>Message: ' . nl2br(htmlspecialchars($this->contactData['message'] ?? 'No message provided')) . '</p>'
    //     );
    // }


    // use Queueable, SerializesModels;

    // protected $contactData;

    // public function __construct(array $contact)
    // {
    //     $this->contactData = $contact;
    //     Log::info('ContactMail constructor', ['contact' => $this->contactData]);
    // }

    // public function envelope(): Envelope
    // {
    //     Log::info('ContactMail envelope method', ['subject' => $this->contactData['subject'] ?? 'N/A']);
    //     return new Envelope(
    //         subject: $this->contactData['subject'] ?? 'New Contact Form Submission',
    //     );
    // }

    // public function content(): Content
    // {
    //     Log::info('ContactMail content method', ['contactData' => $this->contactData]);
    //     return new Content(
    //         text: 'Name: ' . ($this->contactData['name'] ?? 'N/A') . "\n" .
    //             'Email: ' . ($this->contactData['email'] ?? 'N/A') . "\n" .
    //             'Subject: ' . ($this->contactData['subject'] ?? 'N/A') . "\n" .
    //             'Message: ' . ($this->contactData['message'] ?? 'No message provided')
    //     );
    // }




// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Address;
// use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Support\Facades\Log;

// class ContactMail extends Mailable
// {
//     use Queueable, SerializesModels;

//     protected  $contactData;

//     public function __construct(array $contact)
//     {
//         $this->contactData = $contact;
//         Log::info('ContactMail constructor', ['contact' => $this->contactData]);
//     }

//     public function envelope(): Envelope
//     {
//         return new Envelope(
//             subject: $this->contactData['subject'] ?? 'New Contact Form Submission',
//         );
//     }

//     public function content(): Content
//     {
//         return new Content(
//             view: 'mail.contact',
//             with: [
//                 'name' => $this->contactData['name'] ?? 'N/A',
//                 'email' => $this->contactData['email'] ?? 'N/A',
//                 'subject' => $this->contactData['subject'] ?? 'N/A',
//                 'messages' => $this->contactData['message'] ?? 'No message provided',
//             ]
//         );
//     }


// public array $contact;

// public function __construct(array $contact)
// {
//     $this->contact = $contact;
//     Log::info('ContactMail constructor', ['contact' => $this->contact]);
// }

// public function envelope(): Envelope
// {
//     // Use null coalescing operator to provide default values
//     $email = $this->contact['email'] ?? env('MAIL_FROM_ADDRESS');
//     $name = $this->contact['name'] ?? 'Contact Form User';
//     $subject = $this->contact['subject'] ?? 'New Contact Form Submission';

//     return new Envelope(
//         from: new Address($email, $name),
//         subject: $subject,
//     );
// }

// public function content(): Content
// {
//     return new Content(
//         view: 'mail.contact',
//         with: [
//             'name' => $this->contact['name'] ?? 'User',
//             'email' => $this->contact['email'] ?? 'Not provided',
//             'subject' => $this->contact['subject'] ?? 'Not provided',
//             'messages' => $this->contact['message'] ?? 'No message content',
//         ]
//     );
// }





// public $contact;
// /**
//  * Create a new message instance.
//  */
// public function __construct(array $contact)
// {
//     Log::info('ContactMail constructor called with:', ['contact' => $contact]);
//     if (!isset($contact['email']) || !isset($contact['name']) || !isset($contact['subject'])) {
//         Log::error('Missing required fields in $contact', ['contact' => $contact]);
//         throw new \InvalidArgumentException('Missing required fields in contact data');
//     }
//     $this->contact = $contact;
// }



// /**
//  * Get the message envelope.
//  */
// public function envelope(): Envelope
// {
//     Log::info('Envelope contact:', $this->contact);
//     // Log::info('Contact data before sending mail:', ['contact' => $contact]);
//     return new Envelope(

//         from: new Address(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')),
//         subject: $this->contact['subject'],
//         replyTo: [new Address($this->contact['email'], $this->contact['name'])],



//         // from: new Address($this->contact['email'], $this->contact['name']),
//         // subject: $this->contact['subject'],
//     );
// }

// /**
//  * Get the message content definition.
//  */
// public function content(): Content
// {
//     // Log::info('Content contact:', $this->contact);
//     return new Content(
//         view: 'mail.contact',
//         with: [
//             'name'      => $this->contact['name'],
//             'email'     => $this->contact['email'],
//             'subject'   => $this->contact['subject'],
//             'messages'   => $this->contact['message']
//         ]
//     );
// }
