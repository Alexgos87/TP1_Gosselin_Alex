<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('-1 year', 'now');
        $end   = fake()->dateTimeBetween($start, '+30 days');
        return [
            'start_date' => $start,
            'end_date' => $end,
            'total_price' => fake()->randomFloat(2, 10, 500)
        ];
    }
}
