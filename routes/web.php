<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\PdfToTextController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ResumeGenerationController;
use Illuminate\Support\Facades\Route;

// test AI response
Route::get('/openai', [AIController::class, 'CallAI']);

//test pdf to text conversion using static pdf file
Route::get('/pdftotext', [PdfToTextController::class, 'index']);

//test pdf generation using browsershot
Route::get('/resume', [ResumeGenerationController::class, 'index']);

//test resume optimization using static resume and job description
Route::get('/optimize-resume', [AIController::class, 'OptimizeResume']);

//test generate simple resume using blade
Route::get('/resume/simple', [ResumeController::class, 'simple']);

//test generate a mefium style resume using blade 
Route::get('/resume/medium', [ResumeController::class, 'medium']);

//test pdf generation of a simple blade based static resume
Route::get('/resume/medium/pdf', [ResumeController::class, 'mediumPdf']);

//test pdf generation of a midium style blade based static resume
Route::get('/resume/simple/pdf', [ResumeController::class, 'simplePdf']);