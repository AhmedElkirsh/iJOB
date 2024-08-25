<?php

namespace Database\Factories;

use App\Models\ResumeSkill;
use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumeSkillFactory extends Factory
{
    protected $model = ResumeSkill::class;

    public function definition()
    {
        return [
            'resume_id' => Resume::factory(),
            'skill' => $this->faker->word(),
        ];
    }
}
