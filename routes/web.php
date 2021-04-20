<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\SignupController;

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
Route::get('/signup/supplier', [SignupController::class, 'index']);

Route::get('/signup/client', function () {
    return abort(404, 'Not yet implemented.');
});
