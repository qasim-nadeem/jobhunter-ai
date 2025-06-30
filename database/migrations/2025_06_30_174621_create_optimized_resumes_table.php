<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('optimized_resumes', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->unsignedBigInteger('resume_id');
            //optimised resume is strored in a json form here after proccessed by AI
            $table->json('json_resume'); 
            $table->timestamps();

            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('optimized_resumes');
    }
};
