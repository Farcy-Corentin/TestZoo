<?php

namespace Database\Factories;

use App\Models\Zoo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{

    /**
     * @inheritDoc
     */
    public function definition(): array
    {
        return [
            'zoo_id' => Zoo::all()->random()->id,
            'content' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['pending', 'validated', 'rejected']),
            'author' => $this->faker->name(),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
