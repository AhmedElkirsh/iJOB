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
    public function job()
    {
        return $this->belongsTo(Job::class , 'job_id');
    }
 
    public function user()
    {
        return $this->belongsTo(User::class ,'candidate_id' );
    }
    public function candidate()
    {
        return $this->belongsTo(Candidate::class , 'candidate_id');
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class , 'application_id');
    }
}
