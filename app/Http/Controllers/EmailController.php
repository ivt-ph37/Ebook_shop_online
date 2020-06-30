<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect,DB,Config;
use Mail;
class EmailController extends Controller
{
    public function sendEmail()
    {
        //$user = auth()->user();

        Mail::to("dinhlongit1998@gmail.com")->send(new MailNotify());
        if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
        }else{
            return response()->json('Great! Successfully send in your mail');
        }
    }
}
