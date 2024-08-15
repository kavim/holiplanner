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
                'title' => 'Birthday Party',
                'description' => 'Birthday party for my friend',
                'date' => '2024-08-14 02:35:00',
                'location' => 'My house',
            ],
            [
                'title' => 'Meeting',
                'description' => 'Meeting with my boss',
                'date' => '2024-08-14 02:35:00',
                'location' => 'Office',
            ],
            [
                'title' => 'Dinner',
                'description' => 'Dinner with my family',
                'date' => '2024-08-14 02:35:00',
                'location' => 'Restaurant',
            ],
        ];

        foreach ($plans as $plan) {
            \App\Models\Plan::create($plan);
        }
    }
}
