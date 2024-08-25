<?php

namespace Database\Factories;

use App\Models\ResumeProject;
use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResumeProjectFactory extends Factory
{
    protected $model = ResumeProject::class;

    public function definition()
    {
        return [
            'resume_id' => Resume::factory(),
            'project_title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->optional()->date(),
            'project_url' => $this->faker->optional()->url(),
        ];
    }
}
