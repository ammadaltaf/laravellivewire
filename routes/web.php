<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Register;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',Home::class)->name('home')->middleware('auth');
Route::group(['middleware'=>'guest'],function(){
    Route::get('/login',Login::class)->name('login');
    Route::get('/register',Register::class)->name('register');
});
