<?php

use App\Http\Controllers\InvitationController;

Route::get('/', [InvitationController::class, 'home'])->name('home');
Route::get('/participation', [InvitationController::class, 'form'])->name('form');
Route::post('/participation', [InvitationController::class, 'store'])->name('form.store');
Route::get('/merci', [InvitationController::class, 'thankyou'])->name('thankyou');
