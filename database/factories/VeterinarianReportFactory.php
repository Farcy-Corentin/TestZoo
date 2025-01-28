<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VeterinarianReportFactory extends Factory
{

    /**
     * @inheritDoc
     */
    public function definition(): array
    {
        return [
            // TODO: regarder une meilleure query pour animal_id
            'animal_id' => Animal::query()->inRandomOrder()->first()->id,
            'animal_state' => $this->faker->randomElement(['En bonne santé', 'À surveiller', 'Signes de vieillesse']),
            'content' => $this->faker->text(),
            'user_id' => User::query()->where('role', 'veterinarian')->inRandomOrder()->first()->id,
        ];
    }
}
