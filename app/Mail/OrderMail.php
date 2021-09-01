<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    public $checkout;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($checkout)
    {
         $this->checkout=$checkout;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        
        //define our subject line
        $subject = 'Memontogram Order Confirmation Email';
        
        
        return $this->markdown('emails.orderMail')->subject($subject)->with([
            'checkout' => $this->checkout
        ]);

    }
}
