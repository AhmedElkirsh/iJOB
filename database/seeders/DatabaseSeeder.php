<?php

namespace Database\Seeders;

use Database\Seeders\EmployerSeeder;
use Database\Seeders\JobSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            EmployerSeeder::class,
            JobSeeder::class,
        ]);
    }
}