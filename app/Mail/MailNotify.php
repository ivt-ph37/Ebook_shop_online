<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $user,$newcart;
    public function __construct($user,$newcart)
    {
        $this->user = $user;
        $this->cart = $newcart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $total = 0;
        foreach ($this->cart as $item){
            $total = $total +  $item['price'] * $item['amount'];
        }
        return $this->view('email')->with('newcart',$this->cart)->with('user_info',$this->user)->with('total', $total);
    }
}
