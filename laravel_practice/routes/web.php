<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\saveInDBController;
use App\Http\Controllers\actionController;
use App\Http\Controllers\productController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('users', [userController::class, 'index'])->name('users.index');

Route::view('saveInDB', 'saveInDB');
Route::post('saveInDBController', [saveInDBController::class, 'getData']);

//Route::get('actionController', [actionController::class, 'list']);
Route::get('deleteControllerBtn/{id}', [actionController::class, 'Delete']);
Route::get('editControllerBtn/{id}', [actionController::class, 'Edit']);
Route::post('editController', [actionController::class, 'EditData']);
Route::get('fullNameBtn/{id}', [actionController::class, 'fullNameBtn']);
Route::get('productController', [productController::class, 'index']);
Route::post('addproductController', [productController::class, 'addProduct']);
Route::view('addPro', 'addProduct');

Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from Janvi',
        'body' => 'This is for testing email using smtp'
    ];

    Mail::to('janvibhalala15@gmail.com')->send(new \App\Mail\MyTestMail($details));

    dd("Email is Sent.");
});