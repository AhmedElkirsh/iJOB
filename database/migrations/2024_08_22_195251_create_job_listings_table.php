<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('users')->onDelete('cascade');
            $table->string('position_title');
            $table->enum('employment_type', ['full-time', 'part-time', 'contract', 'freelance', 'internship']);
            $table->enum('experience_level', ['Junior', 'Senior', 'Expert']); // subject to change
            $table->string('industry');
            $table->text('job_description');
            $table->string('location');
            $table->enum('job_status', ['not_approved', 'open', 'closed']);
            $table->integer('salary');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
