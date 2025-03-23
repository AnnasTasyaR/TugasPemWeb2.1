<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('web.homepage');
});

Route::get('/products', function () {
    return view("web.halamanproduk");
});


Route::get('/Cart', function () {
    return view("web.halamanCart");
});

Route::get('/Checkout', function () {
    return view("web.halamanCheckout");
});

Route::get('/Orders', function () {
    return "Ini  halaman Orders";
});


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
