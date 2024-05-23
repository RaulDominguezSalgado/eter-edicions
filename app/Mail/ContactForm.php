<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Http\Requests\ContactFormRequest;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    private $request;
    private $action;
    public $locale;

    /**
     * Create a new message instance.
     */
    public function __construct(ContactFormRequest $request, string $action, $locale)
    {
        $this->request = $request;
        $this->action = $action;
        $this->locale = $locale;
    }

    /**
     * Get the message envelope.
     */
    public function envelope($action = null): Envelope
    {
        $action = $this->action;
        switch ($action) {
            case "client":
                return new Envelope(
                    subject: "Hem rebut el teu missatge",
                );
            break;
            case "admin":
                return new Envelope(
                    subject: "Un client ha contactat des del formulari",
                );
            break;
        }
    }

    /**
     * Get the message content definition.
     */
    public function content($action = null): Content
    {
        $action = $this->action;
        switch ($action) {
            case "client":
                return new Content(
                    view: 'mailing.contactFormClient',
                    with: [
                        "request"=>$this->request,
                        "locale"=>$this->locale,
                    ],
                );
            break;
            case "admin":
                return new Content(
                    view: 'mailing.contactFormAdmin',
                    with: [
                        "request"=>$this->request,
                        "locale"=>$this->locale,
                    ],
                );
            break;
        }
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [

        ];
    }
}
