<?php

use App\Showcases;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [ 'showcases' => Showcases::get() ]);
})->name('home');

Route::view('/react-hello-world', 'showcases.react-hello-world')->name('react-hello-world');
Route::view('/react-counter', 'showcases.react-counter')->name('react-counter');
Route::view('/vue-counter', 'showcases.vue-counter')->name('vue-counter');
Route::view('/friends-travel-expenses', 'showcases.friends-travel-expenses')->name('friends-travel-expenses');
