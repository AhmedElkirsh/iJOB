<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $fellible=[
        'skill'
    ];
=======

    protected $fillable = ['skill'];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'required_skills');
    }
    public function candidates()
    {
        return $this->belongsToMany(Candidate::class, 'candidate_skills', 'skill_id', 'candidate_id');
    }
>>>>>>> 69c1e50 (Candidates)
}
