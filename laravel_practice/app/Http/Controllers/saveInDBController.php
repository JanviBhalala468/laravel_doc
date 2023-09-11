<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class saveInDBController extends Controller
{
    //
    function getData(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $member = new User;
        $member->name = $req->name;
        $member->email = $req->input('email');
        $member->password = Hash::make($req->input('password'));
        $member->save();
        return redirect('users');
    }
}