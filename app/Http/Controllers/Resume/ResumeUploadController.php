<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use App\Models\Resume;
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
        $file = $request->file('resume');
        // dd($file);

        //create entry in DB
        $resume = Resume::create([
            'session_id'    => session()->getId(),
            'user_id'       => null,
            'title'         => $file->getClientOriginalName(),
        ]);

        //upload file
        $resume->addMediaFromRequest('resume')->toMediaCollection('resume', 'local');

        return $resume->getMedia('resume')->first()->getUrl();

        return "file Created and uploaded";
    }
}
