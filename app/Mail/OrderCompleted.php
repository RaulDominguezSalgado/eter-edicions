<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderCompleted extends Mailable
{
    use Queueable, SerializesModels;

    // Order data
    private $order = [
        "id",
        "pdf",
    ];

    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hem rebut la teva comanda',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $content = new Content(
            view: 'mailing.orderCompleted',
        );
        return $content->with(['order', $this->order]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments()
    {
        return \Illuminate\Mail\Mailables\Attachment::fromPath($this->order['pdf']);
    }
}
