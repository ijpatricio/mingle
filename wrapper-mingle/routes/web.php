<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('/demo-with-livewire', 'demo-with-livewire')->name('demo-with-livewire');
Route::view('/demo-with-react', 'demo-with-react')->name('demo-with-react');
Route::view('/demo-with-vue', 'demo-with-vue')->name('demo-with-vue');
Route::view('/demo-with-all', 'demo-with-all')->name('demo-with-all');
