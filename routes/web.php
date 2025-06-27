<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\PdfToTextController;
use App\Http\Controllers\ResumeGenerationController;
use Illuminate\Support\Facades\Route;

Route::get('/openai', [AIController::class, 'CallAI']);


Route::get('/pdftotext', [PdfToTextController::class, 'index']);

Route::get('/resume', [ResumeGenerationController::class, 'index']);
