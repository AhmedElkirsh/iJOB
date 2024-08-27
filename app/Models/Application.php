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
        'candidate',
        'resume_file_path',
        'application_type',
        'status'
    ];
    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate');
    }
}
