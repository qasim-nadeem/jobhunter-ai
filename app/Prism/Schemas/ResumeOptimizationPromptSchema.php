<?php
namespace App\Prism\Schemas;

use Illuminate\Support\Facades\Schema;
use Prism\Prism\Schema\ObjectSchema;
use Prism\Prism\Schema\StringSchema;
use Prism\Prism\Schema\EnumSchema;

class ResumeOptimizationPromptSchema
{
    protected $model;
    protected $resumeText;
    protected $jobDescription;
    protected $responseFormat;
    protected ObjectSchema $schema;

    public function __construct(
        string $resumeText,
        string $jobDescription,
        string $model = 'gpt-3.5-turbo',
        string $responseFormat = 'json',
    ){
        $this->model            = $model;
        $this->resumeText       = $resumeText;
        $this->jobDescription   = $jobDescription;
        $this->responseFormat   = $responseFormat;

        $schema = new ObjectSchema(
        name: 'resume_optimization_prompt',
        description: 'Prompt payload to instruct the AI to tailor a resume for ATS based on a job description',
            properties: [
                new StringSchema(
                    name: 'resume_text',
                    description: 'The full original resume/CV as a single text block',
                ),
                new StringSchema(
                    name: 'job_description',
                    description: 'The target job description to optimize the resume against',
                ),
                new StringSchema(
                    name: 'model',
                    description: 'The OpenAI model to use (e.g. "gpt-3.5-turbo")',
                    nullable: false,
                ),
                new EnumSchema(
                    name: 'response_format',
                    description: 'Desired output format',
                    options: ['prism', 'json', 'text'],
                ),
            ],
            requiredFields: ['resume_text', 'job_description', 'model', 'response_format']
        );

        $this->schema = $schema;
    }

    public function toArray()
    {
        $promptData = [
            'resume_text'     => $this->resumeText,
            'job_description' => $this->jobDescription,
            'model'           => $this->model,
            'response_format' => $this->responseFormat,
        ];

        return $promptData;
    }

    public function validate()
    {
        $this->schema->validate($this->toArray());
    }
}