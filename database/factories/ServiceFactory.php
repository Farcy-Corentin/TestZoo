<?php

namespace Database\Factories;

use App\Models\Zoo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * @inheritDoc
     */
    public function definition(): array
    {
        return [
            'zoo_id' => Zoo::all()->random()->id,
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
