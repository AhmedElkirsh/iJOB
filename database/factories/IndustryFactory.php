<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Industry;

class IndustryFactory extends Factory
{
    protected $model = Industry::class;

    public function definition()
    {
        return [
            'industry_name' => $this->faker->word,
        ];
    }
}
