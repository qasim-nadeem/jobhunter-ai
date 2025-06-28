<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class ResumeController extends Controller
{
    public function simple()
    {
        return view('resume.simple-template');
    }

    public function medium()
    {
        return view('resume.medium-template');
    }

     public function simplePdf()
    {
        $html = view('resume.simple-template')->render();
        // 2. Generate the PDF binary
        $screen = Browsershot::html($html)
            ->setNodeBinary(env('NODE_PATH'))
            // point to your NPM binary:
            ->setNpmBinary(env('NPM_PATH'))
            // point to the Chrome executable:
            ->setChromePath(env('CHROME_PATH'))
            ->showBackground()   
            ->margins(5,10,10,5)                // keep colors/backgrounds
            ->emulateMedia('print')             // ensure @media print rules apply
            ->windowSize( 1200, 800 );  

        // dd($fullHeight/76.78);

        $pdf = $screen->paperSize('8.27', '13', 'in')->pdf();

        // 3. Return it as a PDF response
        return response($pdf, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="resume-qasim-nadeem.pdf"',
        ]);
    }

    public function mediumPdf()
    {
        $html = view('resume.medium-template')->render();
        // 2. Generate the PDF binary
        $screen = Browsershot::html($html)
            ->setNodeBinary(env('NODE_PATH'))
            // point to your NPM binary:
            ->setNpmBinary(env('NPM_PATH'))
            // point to the Chrome executable:
            ->setChromePath(env('CHROME_PATH'))
            ->showBackground()   
            ->margins(5,10,10,5)                // keep colors/backgrounds
            ->emulateMedia('print')             // ensure @media print rules apply
            ->windowSize( 1200, 800 );  

        // dd($fullHeight/76.78);

        $pdf = $screen->paperSize('8.27', '14', 'in')->pdf();

        // 3. Return it as a PDF response
        return response($pdf, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="resume-qasim-nadeem.pdf"',
        ]);
    }
}
