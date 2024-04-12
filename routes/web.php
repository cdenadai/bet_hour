<?php

use App\Http\Controllers\BetsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('bets.index');
});

Route::resource('/bets', BetsController::class);
