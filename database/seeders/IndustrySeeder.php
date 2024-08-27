<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Industry;

class IndustrySeeder extends Seeder
{
    /**
     * Seed the industries table.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 industries using the factory
        Industry::factory()->count(10)->create();
    }
}
