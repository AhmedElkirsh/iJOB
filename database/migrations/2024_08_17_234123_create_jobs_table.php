<?php

use App\Models\Employer;
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
            $table->string('title');
            $table->foreignIdfor(Employer::class)->constrained()->onDelete('cascade'); 
            $table->text('job_description');
            $table->string('salary_range');
            $table->string('work_hours');
            $table->string('location');
            $table->enum('employment_type', ['full-time', 'part-time', 'contract', 'freelance', 'internship']);
            $table->date('application_deadline')->nullable();
            $table->string('contact_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
