<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained('users')->onDelete('cascade');
            $table->string('position');
            $table->enum('experience_level', ['Entry', 'Intermediate', 'Advanced'])->nullable();
            $table->string('location')->nullable();
            $table->integer('rate_salary')->nullable();
            $table->string('education_level')->nullable();
            $table->string('certifications')->nullable();
            $table->string('languages')->nullable();
            $table->text('bio')->nullable();

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
