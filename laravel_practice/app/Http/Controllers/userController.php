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
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<div class="d-flex"><a href="fullNameBtn/' . $row->id . '" class="edit btn btn-warning btn-sm m-1">FullName</a><a href="editControllerBtn/' . $row->id . '" class="edit btn btn-info btn-sm m-1">Edit</a> <a href="deleteControllerBtn/' . $row->id . '" class=" btn btn-danger btn-sm m-1">Delete</a><div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users');
    }
}