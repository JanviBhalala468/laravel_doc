<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\saveInDBController;
use App\Http\Controllers\actionController;

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