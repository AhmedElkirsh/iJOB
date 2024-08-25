<?php

namespace Database\Factories;

use App\Models\ResumeEducation;
use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumeEducationFactory extends Factory
{
    protected $model = ResumeEducation::class;

    public function definition()
    {
        return [
            'resume_id' => Resume::factory(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->optional()->date(),
            'organization' => $this->faker->company(),
            'grade' => $this->faker->optional()->word(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
