<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Callback extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->name = $data['name'];
        $this->company = $data['company'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
        $this->text = $data['text'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
                    ->view('frontend.email.callback')
                    ->with([
                      'name' => $this->name,
                      'company' => $this->company,
                      'phone' => $this->phone,
                      'email' => $this->email,
                      'text' => $this->text        
                    ])
                    ->subject('Новое сообщение с сайта: www.ahbk.kz');
    }
}
