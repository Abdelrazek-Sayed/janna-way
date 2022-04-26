<?php


use App\Http\Livewire\Dashboard\Dashboard;
use App\Http\Livewire\Roles\Roles;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::group(
   [
      'prefix' => LaravelLocalization::setLocale(),
      'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
   ],
   function () {

      Route::get('/', Dashboard::class)->name('home');
      Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
         Route::get('/', Dashboard::class)->name('home');
         Route::get('/roles', Roles::class)->name('roles');
      });
   }
);
