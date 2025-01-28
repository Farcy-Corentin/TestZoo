<?php

namespace Database\Factories;

use App\Models\Zoo;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpeningFactory extends Factory
{

    /**
     * @inheritDoc
     */
    public function definition(): array
    {
        return [
            'zoo_id' => Zoo::all()->random()->id,
            'day_open' => $this->faker->dayOfWeek,
            'hour_open' => $this->faker->time('H:i'),
            'hour_close' => $this->faker->time('H:i'),
        ];
    }
}
