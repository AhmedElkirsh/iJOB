<?php

use App\Models\Candidate;
use App\Models\Job;
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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Job::class)->constrained()->onDelete('cascade');
            $table->foreignId('candidate')->constrained('users')->onDelete('cascade');
            /// check for the 2 options and null situation
            $table->string('resume_file_path')->nullable();
            $table->string('cover_letter_file_path')->nullable();
            $table->enum('application_type',['pdf','form']);
            $table->enum('status',['active','awaiting_review','reiviewed','contacted']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
