<?php

use Illuminate\Support\Facades\Route;
use App\Services\Session\SessionService;
use App\Http\Middleware\EnsureSessionIsValid;


Route::middleware([EnsureSessionIsValid::class])->group(function () {
    Route::get('/login', \App\Livewire\Guest\Login::class)->name('login');

    Route::get('/choose-role', \App\Livewire\Guest\ChooseRole::class)->name('choose-role');

    Route::get('/', function() {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', \App\Livewire\Main\Dashboard::class)->name('dashboard');

    Route::prefix('settings')->group(function () {

        Route::prefix('roles')->group(function () {

            Route::get('/', \App\Livewire\Main\Roles\Index::class)->name('roles');

            Route::prefix('add')->group(function () {
                Route::get('/', \App\Livewire\Main\Roles\Create::class)->name('roles-add');
            });

            Route::prefix('edit')->group(function () {
                Route::get('{id}', \App\Livewire\Main\Roles\Edit::class)->name('roles-edit');
            });

            Route::get('delete/{id}', [\App\Livewire\Main\Roles\RoleTable::class, 'delete'])->name('roles-delete');
        });


        Route::prefix('menus')->group(function () {

            Route::get('/', \App\Livewire\Main\Menus\Index::class)->name('menus');

            Route::prefix('add')->group(function () {
                Route::get('/', \App\Livewire\Main\Menus\Create::class)->name('menus-add');
            });

            Route::prefix('edit')->group(function () {
                Route::get('{id}', \App\Livewire\Main\Menus\Edit::class)->name('menus-edit');
            });

            Route::get('delete/{id}', [\App\Livewire\Main\Menus\MenuTable::class, 'delete'])->name('menus-delete');
        });

        Route::get('permissions', \App\Livewire\Main\Roles\Index::class)->name('permissions');

        Route::prefix('mapping')->group(function () {

            Route::get('menus-permissions', \App\Livewire\Main\Roles\Index::class)->name('menus-permissions');

            Route::get('roles-menus', \App\Livewire\Main\Roles\Index::class)->name('roles-menus');

            Route::get('users-roles', \App\Livewire\Main\Roles\Index::class)->name('users-roles');

            Route::get('users-menus', \App\Livewire\Main\Roles\Index::class)->name('users-menus');
        });

    });


    Route::get('/logout', function () {
        $sessionService = new SessionService();
        $sessionService->deleteMain();
        return redirect()->route('login');
    })->name('logout');
});
