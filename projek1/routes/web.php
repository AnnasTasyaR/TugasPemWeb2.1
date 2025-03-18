<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/home', function () {
    return "Ini  halaman home";
});

Route::get('/Login', function () {
    return "Ini  halaman Login";
});

Route::get('/Products', function () {
    return "Ini  halaman Products";
});

Route::get('/Cart', function () {
    return "Ini  halaman Cart";
});

Route::get('/Checkout', function () {
    return "Ini  halaman Checkout";
});

Route::get('/Orders', function () {
    return "Ini  halaman Orders";
});


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
