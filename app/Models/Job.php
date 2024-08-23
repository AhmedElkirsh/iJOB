<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table='job_listings';
    protected $fillable = [
        'employer_id',
        'position_title',
        'employment_type',
        'experience_level',
        'industry',
        'job_description',
        'location',
        'job_status',
        'salary'
    ];
    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }
}
