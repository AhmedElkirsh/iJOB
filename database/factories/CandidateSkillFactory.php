<?php

namespace Database\Factories;

use App\Models\CandidateSkill;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateSkillFactory extends Factory
{
    protected $model = CandidateSkill::class;

    public function definition()
    {
        return [
            'skill_id' => Skill::factory(),
        ];
    }
}
