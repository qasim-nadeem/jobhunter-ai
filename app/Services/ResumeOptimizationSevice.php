<?php
namespace App\Services;

use App\Prism\Schemas\ResumeOptimizationPromptSchema;
use App\Prism\Schemas\ResumeSchema;
use Prism\Prism\Prism;
use Prism\Prism\Enums\Provider;
use Prism\Prism\ValueObjects\Messages\SystemMessage;
use Prism\Prism\ValueObjects\Messages\UserMessage;

class ResumeOptimizationSevice
{
    // protected $resume;
    // protected $jobDescription;
    
    public function __construct(
        // string $resume, 
        // string $jobDescription
    ){
        // $this->resume           = $resume;
        // $this->jobDescription   = $jobDescription;
    }

    public function generateOptimizedResume(
        string $resumeText, 
        string $jobDecription, 
        $model = 'gpt-3.5-turbo', 
        $resumeResponse = 'json'
    ){
        // $resumeOptimizationPrompt   = new ResumeOptimizationPromptSchema($resumeText, $jobDecription);
        $resumeSchema               = (new ResumeSchema())->getSchema();
        // $resumeOptimizationPrompt->validate();


        // 1️⃣ Define your schema
        // $responseStructure = $this->getResponseStructure();

        // 2️⃣ Send your “raw” prompt/data but ask for structured output
        $response = Prism::structured()
        ->using(Provider::OpenAI, $model)
        // ->withSystemPrompt('You are a professional resume write, you will receive a resume text and a job description text, you need to optimize the resume bsed on the job descriotion, need to modify the resume in a way so that it achieve the hieghst ATS scrores, and pass the ATS check for that job description.')
        ->withSchema($resumeSchema)
         ->withMessages([
            new SystemMessage('You are a professional resume write, you will receive a resume text and a job description text, you need to optimize the resume bsed on the job descriotion, need to modify the resume in a way so that it achieve the hieghst ATS scrores, and pass the ATS check for that job description.'),
            new SystemMessage('Must find languages that are mentioned in the provided resume'),
            new SystemMessage('you can add if any skill with level basic, that is missing on the resume but required in job description.'),
            new SystemMessage('you can also tweak the responsibility in the current or past experience where is suits to match the work experience required in the job description.'),
            new UserMessage("Original Resume:\n\n{$resumeText}"),
            new UserMessage("Job Description:\n\n{$jobDecription}"),
        ])
        ->asStructured();  

        return $response;

        // 3️⃣ Grab your typed result
        $structured = $response->structured; 
        echo "<b> Title: </b><br>" . PHP_EOL;
        echo $structured['title'] . "<br>";    // e.g. "Inception"
        echo "<b> Rating: </b><br>" . PHP_EOL;  
        echo $structured['rating'] . "<br>";   // e.g. "5 stars"  
        echo "<b> Summary: </b><br>" . PHP_EOL; 
        echo $structured['summary'] . "<br>";  // e.g. "A mind-bending..."  
    }
}