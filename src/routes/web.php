<?php

use Illuminate\Support\Facades\Route;
use Purifymedia\Contactform\Http\Controllers\ContactController;


    Route::middleware(['web'])->group(function () {
        if (config('contactform.register_routes', true)) {
            Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
        }
        Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    });
