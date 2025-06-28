<?php
namespace App\Services;

use Spatie\PdfToText\Pdf;

class PdfToTextService
{
    public function PdfToText()
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