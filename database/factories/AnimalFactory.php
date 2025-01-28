<?php

namespace Database\Factories;

use App\Models\Habitat;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{

    /**
     * @inheritDoc
     */
    public function definition(): array
    {
        return [
            'habitat_id' => Habitat::all()->random()->id,
            'name' => $this->faker->name(),
            'breed' => $this->faker->name(),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text(),
        ];
    }
}
