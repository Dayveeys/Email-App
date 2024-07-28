<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class LaraEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
        //
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->mailData->subject;
        return $this->view('email.laraemail')
            ->subject($subject)
            ->with(['mailMessage' => $this->mailData]);;

    }
}