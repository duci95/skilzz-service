<?php


namespace App\Mails;

use Illuminate\Http\Request;
use \Illuminate\Mail\Mailable;

class ActivateUserMail extends Mailable
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function buildView()
    {
    }
}
