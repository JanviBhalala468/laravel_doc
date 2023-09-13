<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;



class productController extends Controller
{
    //
    function index(Request $request)
    {

        if ($request->ajax()) {
            $data = product::select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $row->id;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('product');
    }

    function addProduct(Request $req)
    {
        $current = Carbon::now();
        $product = new product;
        $product->name = $req->name;
        $product->mfd = $current;
        $product->ex_date = $current;
        $product->addDate(15);
        $product->save();
        return redirect('product1');
    }
    function Edit($id)
    {
        $data = product::find($id);
        return view('editProduct', ['data' => $data]);
    }
    function EditData(Request $req)
    {
        $data = product::find($req->id);
        $data->name = $req->name;
        $data->addDate($req->days);
        $data->save();
        return redirect('product1');
    }
}