<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Dashboard::class)->name('dashboard');
Route::get('/login', \App\Livewire\Login::class)->name('login');
Route::get('/test', function () {
    return view('welcome');
})->name('test');
