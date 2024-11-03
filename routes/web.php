<?php

use Illuminate\Support\Facades\Route;
use App\Services\Session\SessionService;
use App\Http\Middleware\EnsureSessionIsValid;


Route::middleware([EnsureSessionIsValid::class])->group(function () {
    Route::get('/login', \App\Livewire\Guest\Login::class)->name('login');

    Route::get('/choose-role', \App\Livewire\Guest\ChooseRole::class)->name('choose-role');

    Route::get('/dashboard', \App\Livewire\Main\Dashboard::class)->name('dashboard');

    Route::get('/logout', function () {
        $sessionService = new SessionService();
        $sessionService->deleteMain();
        return redirect()->route('login');
    })->name('logout');
});
