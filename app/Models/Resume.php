<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */  protected $fillable = [
        'application_id',
        'full_name',
        'email',
        'phone',
        'address',
        'marital_status',
        'military_status',
    ];
    public function application()
    {
        return $this->belongsTo(Application::class , 'application_id');
    }

    public function setEducationAttribute($value)
    {
        $this->attributes['education'] = is_array($value) ? implode(', ', $value) : $value;
    }

    /**
     * Get the education attribute.
     * Converts a comma-separated string to an array.
     */
    public function getEducationAttribute($value)
    {
        return explode(', ', $value);
    }

    /**
     * Set the experience attribute.
     * Converts an array to a comma-separated string.
     */
    public function setExperienceAttribute($value)
    {
        $this->attributes['experience'] = is_array($value) ? implode(', ', $value) : $value;
    }

    /**
     * Get the experience attribute.
     * Converts a comma-separated string to an array.
     */
    public function getExperienceAttribute($value)
    {
        return explode(', ', $value);
    }

    /**
     * Set the skills attribute.
     * Converts an array to a comma-separated string.
     */
    public function setSkillsAttribute($value)
    {
        $this->attributes['skills'] = is_array($value) ? implode(', ', $value) : $value;
    }

    /**
     * Get the skills attribute.
     * Converts a comma-separated string to an array.
     */
    public function getSkillsAttribute($value)
    {
        return explode(', ', $value);
    }
}
