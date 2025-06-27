<?php

namespace App\Services\AI;
use Prism\Prism\Prism;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Schema\ObjectSchema;
use Prism\Prism\Schema\StringSchema;

class AIServcice
{
    public function CallChatGPT()
    {
        return 'Called Chat GPT';
    }

    //TODO: create a structure for a resume, and the we will use that structure to receive response from the AI basd on our promt to optimise the CV
    // go through the prism docs and use chatgpt to create a good structure for resume.
    public function getResponseStructure()
    {
        // 1️⃣ Define your example schema for a movie review
        $movieReviewSchema = new ObjectSchema(
            name: 'movie_review',
            description: 'A structured movie review',
            properties: [
                new StringSchema('title',   'The movie title'),
                new StringSchema('rating',  'Rating out of 5 stars'),
                new StringSchema('summary', 'Brief review summary'),
            ],
            requiredFields: ['title','rating','summary']
        );

        return $movieReviewSchema;
    }
}