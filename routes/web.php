<?php

use App\Http\Controllers\AIController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AIController::class, 'CallAI']);
