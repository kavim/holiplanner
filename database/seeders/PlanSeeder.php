<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'title' => 'Birthday Party (DayOff)',
                'description' => 'Birthday party for me, and I will take a day off, and I will invite my friends, and I will invite my family, and I will invite my colleagues',
                'date' => '2024-08-14 02:35:00',
                'location' => 'My house',
            ],
            [
                'title' => 'Learning How to use docker without using Sail',
                'description' => 'Learning how to use docker without using Sail, and how to use docker-compose, and how to use docker-compose with Laravel, and how to use docker-compose with Laravel and Vue.js, and how to use docker-compose with Laravel and Vue.js and Tailwind CSS',
                'date' => '2024-08-14 02:35:00',
                'location' => 'Office',
            ],
            [
                'title' => 'Dinner',
                'description' => 'Dinner with my family, and dinner with my friends, and dinner with my colleagues, and dinner with my boss',
                'date' => '2024-08-14 02:35:00',
                'location' => 'Restaurant',
            ],
        ];

        foreach ($plans as $plan) {
            \App\Models\Plan::create($plan);
        }
    }
}
