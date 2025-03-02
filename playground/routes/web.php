<?php

use App\Showcases;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [ 'showcases' => Showcases::get() ]);
})->name('home');

Route::view('/react-simple', 'showcases.react-simple')->name('react-simple');
Route::view('/react-counter', 'showcases.react-counter')->name('react-counter');
Route::view('/vue-counter', 'showcases.vue-counter')->name('vue-counter');
