<?php
namespace App\Prism\Schemas;

use Prism\Prism\Schema\ObjectSchema;
use Prism\Prism\Schema\StringSchema;
use Prism\Prism\Schema\NumberSchema;
use Prism\Prism\Schema\ArraySchema;
use Prism\Prism\Schema\EnumSchema;

class ResumeSchema
{
    protected ObjectSchema $resumeSchema;

    public function __construct()
    {
        // Contact Info (basic personal details)
        $contactSchema = new ObjectSchema(
            name: 'contact_info',
            description: 'Primary contact details for the candidate',
            properties: [
                new StringSchema('full_name', 'Candidate’s full legal name'),
                new StringSchema('email', 'Primary email address'),
                new StringSchema('phone', 'Primary phone number'),
                new StringSchema('address', 'Mailing address', nullable: true),
                new StringSchema('website', 'Personal or portfolio website URL', nullable: true),
                new StringSchema('linkedin', 'LinkedIn profile URL', nullable: true),
                new StringSchema('github', 'GitHub profile URL', nullable: true),
            ],
            requiredFields: ['full_name', 'email', 'phone']
        );

        // Summary or Objective
        $summarySchema = new ObjectSchema(
            name: 'summary',
            description: 'A brief professional summary or objective statement',
            properties: [
                new StringSchema('text', 'A concise summary of the candidate’s background, skills, and goals'),
            ],
            requiredFields: ['text']
        );

        // Education Entry
        $educationEntry = new ObjectSchema(
            name: 'education_entry',
            description: 'One completed or in-progress educational qualification',
            properties: [
                new StringSchema('institution', 'Name of the educational institution'),
                new StringSchema('degree', 'Degree or certification obtained'),
                new StringSchema('field_of_study', 'Major or field of study', nullable: true),
                new StringSchema('start_date', 'Start date in YYYY-MM format'),
                new StringSchema('end_date', 'End date in YYYY-MM format or "Present"'),
                new NumberSchema('gpa', 'Grade Point Average on a 4.0 scale', nullable: true),
            ],
            requiredFields: ['institution', 'degree', 'start_date', 'end_date']
        );

        // Work Experience Entry
        $experienceEntry = new ObjectSchema(
            name: 'experience_entry',
            description: 'One position held by the candidate',
            properties: [
                new StringSchema('company', 'Company or organization name'),
                new StringSchema('title', 'Job title'),
                new StringSchema('start_date', 'Start date in YYYY-MM format'),
                new StringSchema('end_date', 'End date in YYYY-MM format or "Present"'),
                new ArraySchema(
                    name: 'responsibilities',
                    description: 'Key responsibilities or achievements in this role',
                    items: new StringSchema('responsibility', 'A single responsibility or achievement')
                ),
            ],
            requiredFields: ['company', 'title', 'start_date', 'end_date', 'responsibilities']
        );

        // Skill Entry (with optional proficiency level)
        $skillEntry = new ObjectSchema(
            name: 'skill',
            description: 'One skill with an optional proficiency rating',
            properties: [
                new StringSchema('name', 'Name of the skill or technology'),
                new EnumSchema(
                    name: 'level',
                    description: 'Proficiency level',
                    options: ['beginner', 'intermediate', 'advanced', 'expert'],
                    nullable: true
                ),
            ],
            requiredFields: ['name']
        );

        // Certification Entry
        $certificationEntry = new ObjectSchema(
            name: 'certification',
            description: 'Professional certification or license',
            properties: [
                new StringSchema('name', 'Certification name'),
                new StringSchema('issuer', 'Issuing organization'),
                new StringSchema('date_obtained', 'Date obtained in YYYY-MM format'),
                new StringSchema('expiration_date', 'Expiration date in YYYY-MM format, if any', nullable: true),
            ],
            requiredFields: ['name', 'issuer', 'date_obtained']
        );

        // Language Entry
        $languageEntry = new ObjectSchema(
            name: 'language',
            description: 'Language proficiency',
            properties: [
                new StringSchema('language', 'Name of the language'),
                new EnumSchema(
                    name: 'proficiency',
                    description: 'Proficiency level',
                    options: ['elementary', 'limited_working', 'professional', 'native', 'bilingual']
                ),
            ],
            requiredFields: ['language', 'proficiency']
        );

        // Project Entry
        $projectEntry = new ObjectSchema(
            name: 'project',
            description: 'One project or portfolio item',
            properties: [
                new StringSchema('title', 'Project title'),
                new StringSchema('description', 'Brief project description'),
                new ArraySchema(
                    name: 'technologies',
                    description: 'Technologies or tools used',
                    items: new StringSchema('tech', 'A single technology or tool')
                ),
                new StringSchema('link', 'Link to project or code repository', nullable: true),
            ],
            requiredFields: ['title', 'description', 'technologies']
        );

        // Finally, the top-level resume schema
        $resumeSchema = new ObjectSchema(
            name: 'resume',
            description: 'Complete résumé/CV representation',
            properties: [
                $contactSchema,
                $summarySchema,
                new ArraySchema(
                    name: 'education',
                    description: 'List of educational qualifications',
                    items: $educationEntry
                ),
                new ArraySchema(
                    name: 'work_experience',
                    description: 'List of past job positions',
                    items: $experienceEntry
                ),
                new ArraySchema(
                    name: 'skills',
                    description: 'List of skills with optional proficiency',
                    items: $skillEntry
                ),
                new ArraySchema(
                    name: 'certifications',
                    description: 'Professional certifications and licenses',
                    items: $certificationEntry
                ),
                new ArraySchema(
                    name: 'languages',
                    description: 'Languages spoken with proficiency levels',
                    items: $languageEntry
                ),
                new ArraySchema(
                    name: 'projects',
                    description: 'Relevant portfolio projects',
                    items: $projectEntry
                ),
                new StringSchema('additional_info', 'Any other relevant information or personal interests', nullable: true),
            ],
            requiredFields: [
                'contact_info',
                'summary',
                'education',
                'work_experience',
                'skills',
                'projects'
            ]
        );

        $this->resumeSchema = $resumeSchema;
    }

    public function getSchema(): ObjectSchema
    {
        return $this->resumeSchema;
    }
}
// You can now pass $resumeSchema into Prism to guide structured output or tool parameters.
