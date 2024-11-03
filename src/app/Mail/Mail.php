<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $Title;  // PARAMETRELERI BURAYA KOYACAGI
    public $Mail;
    public $Context;
    public function __construct($Mail,$Content,$Title)
    {
        $this->Title = $Title;
        $this->Mail = $Mail;
        $this->Content = $Content;
        $this->From = (str_contains($_SERVER['HTTP_HOST'], 'medescare'))? 'info@medescare.com' : 'info@magicmedical.de';
        // $this->data = [
        //     'name' => $Title,
        //     'Content' => $Content
        // ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {  

        // return $this->from($this->name)
        //             ->replyTo($this->From)
        //             ->subject('Pending Questions From '. $this->data['name'])
        //             ->view('email');
        return $this->html($this->Content)->subject($this->Title);
    }
}