<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailgunTest extends Mailable
{
    use Queueable, SerializesModels;

    public $name; // プロパティとして定義する

    /**
     * Create a new message instance.
     */
    public function __construct($name)
    {
        $this->name = $name; // コンストラクターで変数を受け取り、プロパティに設定する
    }
    // public function getName() {
    //     return $this->name;
    // }
    // public function setName($name) {
    //     $this->name = $name;
    // }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mailgun Test',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.mailgun_test',
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

    public function build()
    {   
        
        return $this->from('mailgun@sandbox7fa7c57d28814ee6933df915a77df2ee.mailgun.org', 'Excited User')
        ->subject('Hello')
        ->view('emails.mailgun_test')
        ->with(['name' => $this->name,]);
    }
}
