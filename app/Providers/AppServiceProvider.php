<?php

namespace App\Providers;

use App\Models\Animal;
use App\Models\FoodConsum;
use App\Models\Habitat;
use App\Models\Opening;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use App\Models\VeterinarianReport;
use App\Models\Zoo;
use App\Policies\AccountPolicy;
use App\Policies\AnimalsPolicy;
use App\Policies\FoodsConsumPolicy;
use App\Policies\HabitatsPolicy;
use App\Policies\OpeningsPolicy;
use App\Policies\ReportsPolicy;
use App\Policies\ReviewsPolicy;
use App\Policies\ServicesPolicy;
use App\Policies\ZooPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Zoo::class, ZooPolicy::class);
        Gate::policy(User::class, AccountPolicy::class);
        Gate::policy(Review::class, ReviewsPolicy::class);
        Gate::policy(Service::class, ServicesPolicy::class);
        Gate::policy(Opening::class, OpeningsPolicy::class);
        Gate::policy(Habitat::class, HabitatsPolicy::class);
        Gate::policy(Animal::class, AnimalsPolicy::class);
        Gate::policy(VeterinarianReport::class, ReportsPolicy::class);
        Gate::policy(FoodConsum::class, FoodsConsumPolicy::class);
    }

}
