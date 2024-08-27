<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position',
        // Other fields...
    ];

    public function industries()
    {
        return $this->belongsToMany(Industry::class, 'candidate_industry', 'user_id', 'industry_id');
    }
}
