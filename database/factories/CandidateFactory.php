<?php
namespace Database\Factories;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Candidate::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // This assumes User model also has a factory
            'position' => $this->faker->jobTitle,
            'experience_level' => $this->faker->randomElement(['Entry', 'Intermediate', 'Advanced']),
            'location' => $this->faker->city,
            'rate_salary' => $this->faker->numberBetween(30000, 100000),
            'education_level' => $this->faker->word,
            'certifications' => $this->faker->word,
            'languages' => $this->faker->word,
            'bio' => $this->faker->paragraph,
        ];
    }
}

