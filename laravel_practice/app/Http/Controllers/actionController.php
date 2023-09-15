<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\newUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Queue;
use App\Mail\MyTestMail;

class actionController extends Controller
{
    //
    function list()
    {
        return view('userlist', ['data' => User::all()]);
    }
    function Delete($id)
    {
        $data = User::find($id);
        $result = $data->delete();
        if ($result) {
            return redirect('my-test-mail');
            // return redirect('send-mail');
        } else {
            return "try again";
        }
        //return redirect(url()->previous());
    }
    function mailFun()
    {

        // Queue::push(function ($job) {
        //     $details = [
        //         'subject' => 'Mail from mailFun function',
        //         'body' => 'This is for testing email using queue'
        //     ];
        //     Mail::to('janvibhalala15@gmail.com')->queue(new \App\Mail\MyTestMail($details));
        //     $job->delete();
        // });

        // dd("Email is Sent.");
        $details = [
            'subject' => 'Mail from mailFun function mail queueeeee',
            'body' => 'This is for testing email using queue'
        ];
        $recipientEmail = 'janvibhalala15@gmail.com';
        $email = new MyTestMail($details);

        // Push the email sending task onto the Redis queue
        // dispatch(function () use ($recipientEmail, $email) {
        Mail::to($recipientEmail)->queue($email);
        // });


        return 'Email has been queued for sending.';
    }
    function DeleteAjax($id)
    {
        $details = [
            'subject' => 'Mail from Janvi ajax call',
            'body' => 'This is for testing email using ajax on delete'
        ];
        $data = User::find($id);
        $result = $data->delete();
        if ($result) {
            //Mail::to('janvibhalala15@gmail.com')->queue(new MyTestMail($details));
            return "Data Deleted";
        } else {
            return "try again";
        }
    }
    function Edit($id)
    {
        $data = User::find($id);
        return view('saveInDB', ['data' => $data]);
    }
    function EditData(Request $req)
    {
        $data = User::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = Hash::make($req->input('password'));
        $data->save();
        return redirect('users');
    }
    function fullNameBtn($id)
    {
        return User::find($id)->full_name;
        //return "hello";
    }
}