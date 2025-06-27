<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;

class PdfToTextController extends Controller
{
    public function index()
    {
        // get the pdf file from public dir
        $cv = public_path('files/resumes/cv.pdf');
        //initialise the pdftotext text and get the text from pdf
        $text = (new Pdf())
            ->setPdf($cv)
            ->text();

        //return the text
        return $text;
    }
}
