<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
{
    public function send(Request $request)
    {
        $contact = $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'subject'   => 'required|string|max:255',
            'message'   => 'required|string',
        ]);

        Log::info('Validated contact data:', $contact);

        Contact::create($contact);


        try {
            $mailTo = 'amirazalazel@gmail.com'; // Hardcode the email address for testing

            Log::info('Attempting to send mail to: ' . $mailTo);

            $mail = new ContactMail($contact);
            Log::info('ContactMail instance created', ['mail' => $mail]);

            // Mail::raw('Test email content', function ($message) use ($mailTo) {
            //     $message->to($mailTo)
            //         ->subject('Test Email');
            // });
            Mail::to($mailTo)->send($mail);

            Log::info('Mail sent successfully', ['contact' => $contact]);
            return back()->with('success', 'Mail sent successfully');
        } catch (\Exception $e) {
            Log::error('Failed to send mail: ' . $e->getMessage(), [
                'contact' => $contact,
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'previous' => $e->getPrevious() ? [
                    'message' => $e->getPrevious()->getMessage(),
                    'file' => $e->getPrevious()->getFile(),
                    'line' => $e->getPrevious()->getLine()
                ] : null
            ]);
            return back()->with('error', 'Failed to send mail. Please try again.');
        }

        //         [2024-07-24 13:05:35] local.INFO: Validated contact data: {"name":"test5","email":"amirazalazel@gmail.com","subject":"dsfs","message":"fsdsdfs"} 
        // [2024-07-24 13:05:35] local.INFO: Attempting to send mail to: amirazalazel@gmail.com  
        // [2024-07-24 13:05:35] local.INFO: ContactMail constructor {"contact":{"name":"test5","email":"amirazalazel@gmail.com","subject":"dsfs","message":"fsdsdfs"}} 
        // [2024-07-24 13:05:35] local.INFO: ContactMail instance created {"mail":{"App\\Mail\\ContactMail":{"locale":null,"from":[],"to":[],"cc":[],"bcc":[],"replyTo":[],"subject":null,"markdown":null,"view":null,"textView":null,"viewData":[],"attachments":[],"rawAttachments":[],"diskAttachments":[],"callbacks":[],"theme":null,"mailer":null,"connection":null,"queue":null,"delay":null,"afterCommit":null,"middleware":[],"chained":[],"chainConnection":null,"chainQueue":null,"chainCatchCallbacks":null}}} 
        // [2024-07-24 13:05:35] local.INFO: ContactMail envelope method {"subject":"dsfs"} 
        // [2024-07-24 13:05:35] local.INFO: ContactMail content method {"contactData":{"name":"test5","email":"amirazalazel@gmail.com","subject":"dsfs","message":"fsdsdfs"}} 
        // [2024-07-24 13:05:35] local.ERROR: Failed to send mail: View [Name: test5
        // Email: amirazalazel@gmail.com
        // Subject: dsfs
        // Message: fsdsdfs] not found. {"contact":{"name":"test5","email":"amirazalazel@gmail.com","subject":"dsfs","message":"fsdsdfs"},"trace":"#0 C:\\xampp\\htdocs\\KinderGarten\\vendor\\laravel\\framework\\src\\Illuminate\\View\\FileViewFinder.php(79): Illuminate\\View\\FileViewFinder->findInPaths('Name: test5\\nEma...', Array)

        // try {
        //     $mailTo = env('MAIL_FROM_ADDRESS', config('mail.from.address'));

        //     if (empty($mailTo)) {
        //         throw new \Exception('No valid email address to send to.');
        //     }

        //     Log::info('Attempting to send mail to: ' . $mailTo);

        //     $mail = new ContactMail($contact);
        //     Log::info('ContactMail instance created', ['mail' => $mail]);

        //     Mail::to($mailTo)->send($mail);

        //     Log::info('Mail sent successfully', ['contact' => $contact]);
        //     return back()->with('success', 'Mail sent successfully');
        // } catch (\Exception $e) {
        //     Log::error('Failed to send mail: ' . $e->getMessage(), [
        //         'contact' => $contact,
        //         'trace' => $e->getTraceAsString(),
        //         'file' => $e->getFile(),
        //         'line' => $e->getLine(),
        //         'previous' => $e->getPrevious() ? [
        //             'message' => $e->getPrevious()->getMessage(),
        //             'file' => $e->getPrevious()->getFile(),
        //             'line' => $e->getPrevious()->getLine()
        //         ] : null
        //     ]);
        //     return back()->with('error', 'Failed to send mail. Please try again.');
        // }

        //         [2024-07-24 13:17:02] local.INFO: Validated contact data: {"name":"test","email":"Msmystery33@gmail.com","subject":"sda","message":"asdadas"} 
        // [2024-07-24 13:17:02] local.INFO: Attempting to send mail to: amirazalazel@gmail.com  
        // [2024-07-24 13:17:02] local.INFO: ContactMail constructor {"contact":{"name":"test","email":"Msmystery33@gmail.com","subject":"sda","message":"asdadas"}} 
        // [2024-07-24 13:17:02] local.INFO: ContactMail instance created {"mail":{"App\\Mail\\ContactMail":{"locale":null,"from":[],"to":[],"cc":[],"bcc":[],"replyTo":[],"subject":null,"markdown":null,"view":null,"textView":null,"viewData":[],"attachments":[],"rawAttachments":[],"diskAttachments":[],"callbacks":[],"theme":null,"mailer":null,"connection":null,"queue":null,"delay":null,"afterCommit":null,"middleware":[],"chained":[],"chainConnection":null,"chainQueue":null,"chainCatchCallbacks":null}}} 
        // [2024-07-24 13:17:02] local.INFO: ContactMail envelope method {"subject":"sda"} 
        // [2024-07-24 13:17:02] local.INFO: ContactMail content method {"contactData":{"name":"test","email":"Msmystery33@gmail.com","subject":"sda","message":"asdadas"}} 
        // [2024-07-24 13:17:02] local.DEBUG: From: Laravel <amirazalazel@gmail.com>
        // To: amirazalazel@gmail.com
        // Subject: sda
        // MIME-Version: 1.0
        // Date: Wed, 24 Jul 2024 13:17:02 +0000
        // Message-ID: <f08d999246c88182d0276580fc8c2e30@gmail.com>
        // Content-Type: text/html; charset=utf-8
        // Content-Transfer-Encoding: quoted-printable

        // <p>Name: test</p><p>Email: Msmystery33@gmail.com</p><p>Subject: sda</p><p>Message: asdadas</p>  
        // [2024-07-24 13:17:02] local.INFO: Mail sent successfully {"contact":{"name":"test","email":"Msmystery33@gmail.com","subject":"sda","message":"asdadas"}} 



        // try {
        //     $mailTo = env('MAIL_FROM_ADDRESS', config('mail.from.address'));

        //     if (empty($mailTo)) {
        //         throw new \Exception('No valid email address to send to.');
        //     }

        //     Log::info('Attempting to send mail to: ' . $mailTo);

        //     $mail = new ContactMail($contact);
        //     Log::info('ContactMail instance created', ['mail' => $mail]);

        //     Mail::to($mailTo)->send($mail);

        //     Log::info('Mail sent successfully', ['contact' => $contact]);
        //     return back()->with('success', 'Mail sent successfully');
        // } catch (\Exception $e) {
        //     Log::error('Failed to send mail: ' . $e->getMessage(), [
        //         'contact' => $contact,
        //         'trace' => $e->getTraceAsString(),
        //         'file' => $e->getFile(),
        //         'line' => $e->getLine()
        //     ]);
        //     return back()->with('error', 'Failed to send mail. Please try again.');
        // }

        // public function send(Request $request)
        // {
        //     $contact = $request->validate(
        //         [
        //             'name'      => 'required|string|max:255',
        //             'email'     => 'required|email',
        //             'subject'   => 'required|string|max:255',
        //             'message'   => 'required|string',
        //         ]
        //     );
        //     Log::info('Validated contact data:', $contact);

        //     Contact::create($contact);

        //     try {
        //         $mailTo = env('MAIL_FROM_ADDRESS') ?? config('mail.from.address');

        //         if (empty($mailTo)) {
        //             throw new \Exception('No valid email address to send to.');
        //         }

        //         Log::info('Attempting to send mail to: ' . $mailTo);

        //         Mail::to($mailTo)->send(new ContactMail($contact));

        //         Log::info('Mail sent successfully', ['contact' => $contact]);
        //         return back()->with('success', 'Mail sent successfully');
        //     } catch (\Exception $e) {
        //         Log::error('Failed to send mail: ' . $e->getMessage(), [
        //             'contact' => $contact,
        //             'trace' => $e->getTraceAsString(),
        //             'file' => $e->getFile(),
        //             'line' => $e->getLine()
        //         ]);
        //         return back()->with('error', 'Failed to send mail. Please try again.');
        //     }


        // try {
        //     $mailTo = env('MAIL_FROM_ADDRESS');
        //     Log::info('Attempting to send mail to: ' . $mailTo);

        //     Mail::to($mailTo)->send(new ContactMail($contact));

        //     Log::info('Mail sent successfully', ['contact' => $contact]);
        //     return back()->with('success', 'Mail sent successfully');
        // } catch (\Exception $e) {
        //     Log::error('Failed to send mail: ' . $e->getMessage(), [
        //         'contact' => $contact,
        //         'trace' => $e->getTraceAsString(),
        //         'file' => $e->getFile(),
        //         'line' => $e->getLine()
        //     ]);
        //     return back()->with('error', 'Failed to send mail. Please try again.');
        // }
        // // Log::info('contact contacts->', $contact);
        // // Log::info('Attempting to send mail to: ' . env('MAIL_FROM_ADDRESS'));
        // try {
        //     Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($contact));
        //     Log::info('Mail sent successfully', ['contact' => $contact]);
        //     return back()->with('success', 'Mail sent successfully');
        // } catch (\Exception $e) {
        //     Log::error('Failed to send mail: ' . $e->getMessage(), ['contact' => $contact, 'trace' => $e->getTraceAsString()]);
        //     return back()->with('error', 'Failed to send mail. Please try again.');
        // }

        // try {
        //     $mailTo = env('MAIL_FROM_ADDRESS');
        //     if (!$mailTo) {
        //         throw new \Exception('MAIL_FROM_ADDRESS is not set in .env file');
        //     }
        //     Log::info('Attempting to send email', ['to' => $mailTo, 'contact' => $contact]);
        //     Mail::to($mailTo)->send(new ContactMail($contact));
        //     Log::info('Mail sent successfully', ['to' => $mailTo]);
        //     return back()->with('success', 'Mail sent successfully');
        // } catch (\Exception $e) {
        //     Log::error('Failed to send mail: ' . $e->getMessage(), ['contact' => $contact, 'trace' => $e->getTraceAsString()]);
        //     return back()->with('error', 'Failed to send mail. Please try again.');
        // }



        //     Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($contact));


    }
}
