<?php

use App\Models\Application;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            // $table->string('resume_file_path');
            $table->foreignIdFor(Application::class)->constrained()->onDelete('cascade');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address'); //maybe optimize?
            $table->enum('marital_status',['single','married']);
            $table->enum('military_status',['completed','exempted','unknown'])->nullable();
            // $table->text('education');
            // $table->text('experience');
            // $table->string('projects');
            // $table->text('skills');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}
