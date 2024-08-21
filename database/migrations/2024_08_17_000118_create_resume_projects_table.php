<?php

use App\Models\Resume;
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
        Schema::create('resume_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Resume::class)->constrained()->onDelete('cascade');
            $table->string('project_title'); 
            $table->text('description'); 
            $table->date('start_date'); 
            $table->date('end_date')->nullable(); 
            $table->string('project_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_projects');
    }
};
