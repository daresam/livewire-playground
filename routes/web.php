<?php

use App\Livewire\CreateStudent;
use App\Livewire\ListStudents;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::middleware('auth')->group(function () {
    Route::get('students', ListStudents::class)->name('students.index');
    Route::get('students/create', CreateStudent::class)->name('students.create');
});

require __DIR__.'/auth.php';
