<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table='job_listings';
=======

    // Specify the table name if it differs from the model name
    protected $table = 'job_listings';

>>>>>>> 69c1e50 (Candidates)
    protected $fillable = [
        'employer_id',
        'position_title',
        'employment_type',
        'experience_level',
        'industry',
        'job_description',
        'location',
        'job_status',
<<<<<<< HEAD
        'salary'
    ];
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function responsibilities()
    {
        return $this->hasMany(Responsibility::class, 'job_id');
    }
    public function qualifications()
    {
        return $this->hasMany(Qualification::class,'job_id');
=======
        'salary',
    ];
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'required_skills');
>>>>>>> 69c1e50 (Candidates)
    }
}
