<?php

namespace App\Http\Controllers;

use App\Services\AI\AIServcice;
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
}
