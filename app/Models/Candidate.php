<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
<<<<<<< HEAD
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position',
        // Other fields...
    ];

    public function industries()
    {
        return $this->belongsToMany(Industry::class, 'candidate_industry', 'user_id', 'industry_id');
=======
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
>>>>>>> 69c1e50 (Candidates)
    }
}
