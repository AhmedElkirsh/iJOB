<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsibility extends Model
{
    use HasFactory;
    protected $table = 'responsibilities';
    protected $fillable = [
        'job_id',
        'responsibility'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
