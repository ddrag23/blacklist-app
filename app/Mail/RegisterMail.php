<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->body['email'])
            ->subject('Mendaftar aplikasi blacklist-app')
            ->view('mail')
            ->with([
                'nama' => $this->body['nama'],
                'username' => $this->body['username'],
                'email' => $this->body['email'],
                'notelp' => $this->body['notelp'],
                'alamat' => $this->body['alamat'],
            ]);
    }
}
