<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => $this->faker->optional()->dateTime(),
            'password' => $this->faker->password, // bcrypt('password') can also be used
            'remember_token' => Str::random(10),
            'user_type' => $this->faker->randomElement(['admin', 'candidate', 'employer']),
        ];
    }
}
