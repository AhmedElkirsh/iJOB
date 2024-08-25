<?php

namespace Database\Factories;

use App\Models\ResumeExperience;
use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumeExperienceFactory extends Factory
{
    protected $model = ResumeExperience::class;

    public function definition()
    {
        return [
            'resume_id' => Resume::factory(),
            'job_title' => $this->faker->jobTitle(),
            'company_name' => $this->faker->company(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->optional()->date(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
