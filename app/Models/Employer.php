<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'name',
        'employer_type',
        'location',
        'website_url',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'employer_id', 'user_id');
    }
}
