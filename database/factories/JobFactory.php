<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition()
    {
        // Fetch a random existing employer
        $employer = Employer::inRandomOrder()->first();

        if (!$employer) {
            throw new \Exception("No employers found. Please seed the employers table first.");
        }

        // Fetch a random existing employer
        $employer = Employer::inRandomOrder()->first();

        if (!$employer) {
            throw new \Exception("No employers found. Please seed the employers table first.");
        }

        return [
            'employer_id' => $employer->user_id, // Use existing employer's user_id
            'position_title' => $this->faker->jobTitle,
            'employment_type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'freelance', 'internship']),
            'experience_level' => $this->faker->randomElement(['Junior', 'Senior', 'Expert']),
            'industry' => $this->faker->word,
            'job_description' => $this->faker->paragraph,
            'location' => $this->faker->city . ', ' . $this->faker->state,
            'job_status' => $this->faker->randomElement(['not_approved', 'open', 'closed']),
            'salary' => $this->faker->numberBetween(30000, 120000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
