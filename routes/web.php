<?php

use App\Http\Controllers\SinglePageController;
use Illuminate\Support\Facades\Route;

Route::get('/{any}', [SinglePageController::class, 'index'])->where('any', '.*');
