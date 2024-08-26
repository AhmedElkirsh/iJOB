<?php

namespace Database\Seeders;
// use Database\Factories\JobFactory;
use App\Models\Job;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run()
    {
        Job::factory()->count(10)->create();
    }
}
