<?php

use App\Http\Controllers\BasicInformationController;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home',function (){
    return view('home');
});

Route::get("/basic/{id}",[BasicInformationController::class, 'basicInformation']);

//Route::get('/basic',function (){
//    return view('basic');
//});

Route::get('/basic2',function (){
    return view('basic2');
});

Route::get('/basic3',function (){
    return view('basic3');
});
