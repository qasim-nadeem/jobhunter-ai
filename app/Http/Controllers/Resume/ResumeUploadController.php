<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResumeUploadController extends Controller
{
    //dislay the uplaod resume form to the user
    public function index()
    {
        return view('resume.resumeUploadForm');
    }

    //recieve the uploaded resume file from the browser
    public function post(Request $request)
    {
        dd($request->files->all());
        return view('resume.resumeUploadForm');
    }
}
