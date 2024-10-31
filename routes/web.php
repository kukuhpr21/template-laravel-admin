<?php

use App\Http\Middleware\EnsureSessionIsValid;
use Illuminate\Support\Facades\Route;


Route::middleware([EnsureSessionIsValid::class])->group(function () {
    Route::get('/login', \App\Livewire\Login::class)->name('login');
    Route::get('/', \App\Livewire\Dashboard::class)->name('dashboard');
});
