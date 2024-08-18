<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date' => $this->faker->dateTime,
            'location' => $this->faker->address,
        ];
    }

    /**
     * Define participants for the plan.
     *
     * @param array<int> $ids
     * @return $this
     */
    public function withParticipants(array $ids)
    {
        return $this->afterCreating(function (Plan $plan) use ($ids) {
            $plan->participants()->sync($ids);
        });
    }
}
