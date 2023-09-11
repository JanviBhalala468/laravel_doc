<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MyTestMailable;

class mailController extends Controller
{
    //
    function index()
    {
        $myEmail = 'janvibhalala15@gmail.com';
        Mail::to($myEmail)->send(new MyTestMailable());


        dd("Mail Send Successfully");
    }
}