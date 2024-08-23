<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run()
    {
        // Create job listings for the existing employers
        Job::factory()->count(20)->create();
    }
}
