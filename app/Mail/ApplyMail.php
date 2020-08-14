<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
       public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email/email')
            ->with(['firstname'=>$this->data['firstname'],
                    'lastname'=>$this->data['lastname'],
                    'email'=>$this->data['email'],
                    'number'=>$this->data['number'],
                    'address'=>$this->data['address'],
                    'addition'=>$this->data['addition']])
            ->from('site1350@gmail.com')
            ->subject('New Application')
            ->attach($this->data['file']->getRealPath(),
                [
                    'as' => $this->data['file']->getClientOriginalName(),
                    'mime' => $this->data['file']->getClientMimeType(),
                ]);
    }
}

