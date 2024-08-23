<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeExperience extends Model
{
    use HasFactory;
    protected $table='resume_experiences';
    protected $fillable = [
        'job_title',
        'company_name',
        'start_date',
        'end_date',
        'description'
    ];
}
