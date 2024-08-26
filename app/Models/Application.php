<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',  // assuming 'job_id' is the foreign key
        'candidate_id',
        'resume_file_path',
        'application_type',
        'status',
    ];
}
