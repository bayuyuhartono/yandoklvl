<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OtpChecking extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $otpsend;

    public function __construct($otpsend)
    {
        $this->otpsend = $otpsend;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('dev.yuhartono@gmail.com')
                    ->subject('Kode OTP UNTAR')
                    ->view('mail.otpchecking')
                    ->with(['otp_code' => $this->otpsend]); 
    }
}
