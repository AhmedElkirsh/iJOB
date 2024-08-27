<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Candidate extends Model
{
    use HasFactory;
    // Set the table name if it's not following Laravel's convention
    protected $table = 'candidates';

    // Specify primary key
    protected $primaryKey = 'user_id';

    // Disable incrementing if your primary key is not an integer
    public $incrementing = false;

    // Fillable fields for mass assignment
    protected $fillable = [
        'industry',
        'position',
        'experience_level',
        'location',
        'rate_salary',
        'education_level',
        'certifications',
        'languages',
        'bio',
    ];
    // Cast json fields to array
    protected $casts = [
        'certifications' => 'array',
        'languages' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'candidate_skills', 'candidate_id', 'skill_id');
    }
}
