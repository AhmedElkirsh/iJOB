<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeProjects extends Model
{
    use HasFactory;
    protected $table='resume_projects';
    protected $fillable = [
        'project_title',
        'description',
        'start_date',
        'end_date',
        'project_url'
    ];
}
