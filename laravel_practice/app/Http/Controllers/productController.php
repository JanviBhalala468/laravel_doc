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
        $product = new product;
        $product->name = $req->name;
        $product->mfd = $req->input('date');
        $product->addDate($req->days);
        $product->save();
        return redirect(url()->previous());
    }
}