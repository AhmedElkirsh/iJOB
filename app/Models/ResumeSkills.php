<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeSkills extends Model
{
    use HasFactory;
    protected $table='resume_skills';
    protected $fellible=[
        'skill'
    ];
}
