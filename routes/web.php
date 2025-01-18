<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Prompt\Chat;


Route::get('/', Chat::class)->name('pages.prompt');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
