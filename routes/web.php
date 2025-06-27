<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\PdfToTextController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AIController::class, 'CallAI']);


Route::get('/pdftotext', [PdfToTextController::class, 'index']);
