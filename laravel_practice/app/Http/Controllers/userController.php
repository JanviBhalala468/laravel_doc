<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class userController extends Controller
{
    //
    public function index(Request $request)
    {
        $customParam = $request->input('custom_param');
        if ($request->ajax()) {
            // return ($request->custom_param);
            $data = User::select('*');
            // ->where('name', $customParam)
            //     ->get();

            return Datatables::of($data)
                ->addIndexColumn()->addColumn('FullName', function ($row) {
                    return User::find($row->id)->full_name;
                })
                ->addColumn('action', function ($row) {
                    return $row->id;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users');
    }
}