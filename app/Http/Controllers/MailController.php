<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function SendEmail(Request $request) {
        $details = [
            'title' => $request->input('title') ,
            'body' => $request->input('body')
        ];

        Mail::to( $request->input('email'))->send(new TestMail($details));
        return Redirect::to('validasiakses');
    }
}
