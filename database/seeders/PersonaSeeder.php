<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Food;
use App\Models\FoodConsum;
use App\Models\Habitat;
use App\Models\Opening;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use App\Models\VeterinarianReport;
use App\Models\Zoo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PersonaSeeder extends Seeder
{
    public function run(): void
    {
        $persona = config('personaSeeder.persona');

        $this->zoo($persona['zoo']);
        $this->users($persona['users']);
        $this->habitats($persona['habitats']);
        $this->animals($persona['animals']);
        $this->services($persona['services']);
        $this->openings($persona['openings']);
        $this->reviews($persona['reviews']);
        $this->foods($persona['foods']);
        $this->veterinarianReports($persona['veterinarian_reports']);
        $this->foodsConsum($persona['foods_consum']);
    }

    private function zoo(array $zoo): void
    {
        foreach ($zoo as $zooValue) {
            $newZoo = [
                'id' => $zooValue['id'],
                'name' => $zooValue['name'],
                'description' => $zooValue['description'],
            ];

            Zoo::factory()
                ->create($newZoo);
        }
    }

    private function users(array $users): void
    {
        foreach ($users as $user) {
            $newUser = [
                'id' => $user['id'],
                'zoo_id' => $user['zoo_id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'role' => $user['role'],
            ];

            User::factory()
                ->create($newUser);
        }
    }

    private function habitats(array $habitats): void
    {
        foreach ($habitats as $habitat) {
            $newHabitat = [
                'id' => $habitat['id'],
                'zoo_id' => $habitat['zoo_id'],
                'name' => $habitat['name'],
                'description' => $habitat['description'],
                'image' => $habitat['image'],
            ];

            Habitat::factory()
                ->create($newHabitat);
        }
    }

    private function services(array $services): void
    {
        foreach ($services as $service) {
            $newService = [
                'id' => $service['id'],
                'zoo_id' => $service['zoo_id'],
                'name' => $service['name'],
                'description' => $service['description'],
                'image' => $service['image'],
            ];

            Service::factory()
                ->create($newService);
        }
    }

    private function animals(array $animals): void
    {
        foreach ($animals as $animal) {
            $newAnimal = [
                'id' => $animal['id'],
                'habitat_id' => $animal['habitat_id'],
                'name' => $animal['name'],
                'breed' => $animal['breed'],
                'description' => $animal['description'],
                'image' => $animal['image'],
            ];

            Animal::factory()
                ->create($newAnimal);
        }
    }

    private function openings(array $openings): void
    {
        foreach ($openings as $opening) {
            $newOpening = [
                'id' => $opening['id'],
                'zoo_id' => $opening['zoo_id'],
                'day_open' => $opening['day_open'],
                'hour_open' => $opening['hour_open'],
                'hour_close' => $opening['hour_close'],
            ];

            Opening::factory()
                ->create($newOpening);
        }
    }

    private function reviews(array $reviews): void
    {
        foreach ($reviews as $review) {
            $newReview = [
                'id' => $review['id'],
                'zoo_id' => $review['zoo_id'],
                'content' => $review['content'],
                'status' => $review['status'],
                'author' => $review['author'],
                'rating' => $review['rating'],
            ];

            Review::factory()
                ->create($newReview);
        }
    }

    private function foods(array $foods): void
    {
        foreach ($foods as $food) {
            $newFood = [
                'id' => $food['id'],
                'name' => $food['name'],
            ];

            Food::factory()
                ->create($newFood);
        }
    }


    private function foodsConsum(array $foodsConsum): void
    {
        foreach ($foodsConsum as $foodConsum) {
            $newFoodsConsum = [
                'id' => $foodConsum['id'],
                'animal_id' => $foodConsum['animal_id'],
                'food_id' => $foodConsum['food_id'],
                'quantity' => $foodConsum['quantity'],
            ];

            FoodConsum::factory()
                ->create($newFoodsConsum);
        }
    }


    private function veterinarianReports(array $veterinarianReports): void
    {
        foreach ($veterinarianReports as $veterinarianReport) {
            $newVeterinarianReport = [
                'id' => $veterinarianReport['id'],
                'animal_id' => $veterinarianReport['animal_id'],
                'animal_state' => $veterinarianReport['animal_state'],
                'food_consum_id' => $veterinarianReport['food_consum_id'],
                'content' => $veterinarianReport['content'],
                'user_id' => $veterinarianReport['user_id'],
            ];

            VeterinarianReport::factory()
                ->create($newVeterinarianReport);
        }
    }
}
