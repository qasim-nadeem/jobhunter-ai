<?php

namespace App\Http\Controllers;

use App\Services\AI\AIServcice;
use App\Services\PdfToTextService;
use App\Services\ResumeOptimizationSevice;
use Illuminate\Http\Request;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Prism;

class AIController extends Controller
{
    private $AIServcice;

    public function __construct(AIServcice $AIServcice)
    {
        $this->AIServcice = $AIServcice;        
    }

    public function CallAI()
    {
        // 1️⃣ Define your schema
        $responseStructure = $this->AIServcice->getResponseStructure();

        // 2️⃣ Send your “raw” prompt/data but ask for structured output
        $response = Prism::structured()
        ->using(Provider::OpenAI, 'gpt-3.5-turbo')
        ->withSchema($responseStructure)
        ->withPrompt('Review the movie Jab tak hai jaan')    // or ->withMessages([...])
        ->asStructured();  

        // 3️⃣ Grab your typed result
        $structured = $response->structured; 
        echo "<b> Title: </b><br>" . PHP_EOL;
        echo $structured['title'] . "<br>";    // e.g. "Inception"
        echo "<b> Rating: </b><br>" . PHP_EOL;  
        echo $structured['rating'] . "<br>";   // e.g. "5 stars"  
        echo "<b> Summary: </b><br>" . PHP_EOL; 
        echo $structured['summary'] . "<br>";  // e.g. "A mind-bending..."  

        // return $response->text;
    }

    public function OptimizeResume(
        PdfToTextService $pdfToTextService, 
        ResumeOptimizationSevice $resumeOptimizationSevice
    ){
        $resumeText         = $pdfToTextService->PdfToText();
        $jobDescription = <<<JD
                        About the job
                        We are looking for a Senior Backend Engineer (PHP/Laravel) to join the merchant-focused squads. The role will be heavily involved in building and scaling backend services that directly support our merchants, across different streams. Here's a quick overview:

                        PHP + Laravel (core stack)
                        RESTful APIs, integrations, scalable architecture
                        Focused on merchant journeys (orders, shipping, Catalog, etc.)
                        Working closely with product, design & engineering teams
                        Clean code, testing, and performance-minded development

                        Responsibilities

                        Write "clean", well-designed code 
                        Produce detailed specifications 
                        Troubleshoot, test, and maintain the core product software and databases to ensure strong optimization and functionality 
                        Contribute to all phases of the development lifecycle
                        Follow industry best practices 
                        Develop and deploy new features to facilitate related procedures and tools if necessary 
                        Write high-quality code with readability, efficiency, and maintainability in mind. 
                        Build reusable code and libraries for future use 
                        Analyze performance 
                        Mentor junior and mid-level engineers 

                        Requirements

                        Proven software development experience in PHP and Laravel 
                        Demonstrable knowledge of web technologies including HTML, CSS, JavaScript, AJAX, etc. 
                        Experience in common third-party APIs (Google, Facebook, eBay, etc.) 
                        Good knowledge of relational databases, version control tools, and of developing web services 
                        Passion for best design and coding practices and a desire to develop new bold ideas 
                        BS/MS degree in Computer Science, Engineering, or a related subject is a plus
                        JD;

        $optimizedResume    = $resumeOptimizationSevice->generateOptimizedResume($resumeText, $jobDescription);

        dd(json_decode($optimizedResume->text, true));

        return json_decode($optimizedResume->text, true);
    }
}
