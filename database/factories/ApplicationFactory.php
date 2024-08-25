<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition()
    {
        return [
            'job_id' => Job::factory(),
            'candidate_id' => User::factory(),
            'resume_file_path' => $this->faker->optional()->filePath(),
            'cover_letter_file_path' => $this->faker->optional()->filePath(),
            'application_type' => $this->faker->randomElement(['pdf', 'form']),
            'status' => $this->faker->randomElement(['active', 'awaiting_review', 'reviewed', 'contacted']),
        ];
    }
}
