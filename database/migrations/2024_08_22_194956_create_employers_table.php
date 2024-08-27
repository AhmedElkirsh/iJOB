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
        Schema::create('employers', function (Blueprint $table) {
<<<<<<< HEAD:database/migrations/2024_08_22_194956_create_employers_table.php
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->primary();
            $table->string('name');
=======
            $table->foreignId('user_id')->primary()->constrained('users')->onDelete('cascade');
            // $table->string('name');
>>>>>>> 69c1e50 (Candidates):database/migrations/2024_08_17_000011_create_employers_table.php
            $table->enum('employer_type', ['company', 'individual', 'non-profit']);
            $table->string('location');
            $table->string('website_url')->nullable();
            $table->text('bio')->nullable();
            $table->timestamps();
        });
        
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
