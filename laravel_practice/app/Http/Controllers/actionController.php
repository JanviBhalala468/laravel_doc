<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\newUser;
use Illuminate\Support\Facades\Hash;

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
            return redirect('send-mail');
        } else {
            return "try again";
        }
        //return redirect(url()->previous());
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