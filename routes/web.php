<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Auther\Auther;
use App\Http\Livewire\Category\Category;
use App\Http\Livewire\Dashboard\Dashboard;
use App\Http\Livewire\Roles\Roles;
use App\Http\Livewire\Users\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Auth::routes(['register' => false]);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
            Route::get('/', Dashboard::class)->name('home');
            Route::get('/roles', Roles::class)->name('roles');
            Route::get('/users', Users::class)->name('users');
            Route::get('/categories', Category::class)->name('categories');
            Route::get('/authers', Auther::class)->name('authers');
        });
    }
);
