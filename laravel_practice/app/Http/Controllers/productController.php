<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    //
    function index()
    {
        return product::all();
    }
    function addProduct(Request $req)
    {
        $member = new product;
        $member->name = $req->name;
        $member->mfd = $req->input('date');
        $member->addDate($req->days);
        $member->save();
        return redirect(url()->previous());
    }
}