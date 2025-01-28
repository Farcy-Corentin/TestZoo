<?php

use App\Http\Controllers\Admin\AnimalsAdminController;
use App\Http\Controllers\Admin\FoodsConsumAdminController;
use App\Http\Controllers\Admin\HabitatsAdminController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\OpeningsAdminController;
use App\Http\Controllers\Admin\ReviewsAdminController;
use App\Http\Controllers\Admin\ServicesAdminController;
use App\Http\Controllers\Admin\VeterinarianReportsAdminController;
use App\Http\Controllers\Admin\ZooAdminController;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HabitatsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalNoticesController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/habitats', [HabitatsController::class, 'index'])->name('habitats');
Route::get('/habitat/{name}', [HabitatsController::class, 'show'])->name('habitat');
Route::get('/animals', [AnimalsController::class, 'index'])->name('animals');
Route::get('/animal/{name}', [AnimalsController::class, 'show'])->name('animal');
Route::get('/review', [ReviewsController::class, 'createForm'])->name('review');
Route::get('/legal-notices', [LegalNoticesController::class, 'show'])->name('legal-notices');
Route::get('/contact', [ContactUsController::class, 'show'])->name('contact');
Route::post('/api/contact', [ContactUsController::class, 'send'])->name('contact.send');

// TODO : BONUS => faire le MVC de ces routes
Route::get('/ticketing', function () {})->name('ticketing');
Route::get('/cgv', function () {})->name('cgv');
Route::get('/faq', function () {})->name('faq');
// END TODO

Route::get('/login', [LoginController::class, 'login' ])->name('login');
Route::post('/login',[LoginController::class, 'authenticate' ])->name('auth.authenticate');
Route::get('/register', [RegisterController::class, 'register' ])->name('auth.register');
Route::post('/register',[RegisterController::class, 'registerPost' ])->name('auth.registerPost');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [HomeAdminController::class, 'index'])->name('dashboard');

    Route::get('/logout', [LogoutController::class, 'logout' ])->name('auth.logout');

    Route::get('admin/zoo/habitats', [HabitatsAdminController::class, 'index' ])->name('admin.habitats');
    Route::get('admin/zoo/habitats/create', [HabitatsAdminController::class, 'createForm'])->name('habitats.createForm');
    Route::post('admin/zoo/habitats/create', [HabitatsAdminController::class, 'create'])->name('habitats.create');
    Route::get('admin/zoo/habitats/edit/{name}', [HabitatsAdminController::class, 'edit'])->name('habitats.edit');
    Route::patch('admin/zoo/habitats/edit/{name}', [HabitatsAdminController::class, 'update'])->name('habitats.update');
    Route::delete('admin/zoo/habitats/edit/{name}', [HabitatsAdminController::class, 'delete'])->name('habitats.delete');

    Route::get('admin/zoo/animals', [AnimalsAdminController::class, 'index' ])->name('admin.animals');
    Route::get('admin/zoo/animals/create', [AnimalsAdminController::class, 'createForm'])->name('animals.createForm');
    Route::post('admin/zoo/animals/create', [AnimalsAdminController::class, 'create'])->name('animals.create');
    Route::get('admin/zoo/animals/edit/{name}', [AnimalsAdminController::class, 'edit'])->name('animals.edit');
    Route::patch('admin/zoo/animals/edit/{name}', [AnimalsAdminController::class, 'update'])->name('animals.update');
    Route::delete('admin/zoo/animals/edit/{name}', [AnimalsAdminController::class, 'delete'])->name('animals.delete');

    Route::get('admin/zoo/services/create', [ServicesAdminController::class, 'createForm'])->name('services.createForm');
    Route::post('admin/zoo/services/create', [ServicesAdminController::class, 'create'])->name('services.create');
    Route::get('admin/zoo/services/edit/{name}', [ServicesAdminController::class, 'edit'])->name('services.edit');
    Route::patch('admin/zoo/services/edit/{name}', [ServicesAdminController::class, 'update'])->name('services.update');
    Route::delete('admin/zoo/services/edit/{name}', [ServicesAdminController::class, 'delete'])->name('services.delete');

    Route::get('admin/zoo/openings/create', [OpeningsAdminController::class,'createForm'])->name('openings.createForm');
    Route::post('admin/zoo/openings/create',[OpeningsAdminController::class, 'create'])->name('openings.create');
    Route::get('admin/zoo/openings/edit/{day_open}', [OpeningsAdminController::class, 'edit'])->name('openings.edit');
    Route::patch('admin/zoo/openings/edit/{day_open}', [OpeningsAdminController::class, 'update'])->name('openings.update');
    Route::delete('admin/zoo/openings/edit/{day_open}', [OpeningsAdminController::class, 'delete'])->name('openings.delete');

    Route::get('admin/zoo/reviews', [ReviewsAdminController::class, 'index'])->name('reviews.list');
    Route::get('admin/zoo/reviews/pending', [ReviewsAdminController::class, 'getPendingReviews'])->name('reviews.pending');
    Route::get('admin/zoo/reviews/create', [ReviewsAdminController::class, 'createForm'])->name('reviews.createForm');
    Route::delete('admin/zoo/reviews/edit/{id}', [ReviewsAdminController::class, 'delete'])->name('reviews.delete');

    // TODO: en bonus faire la page index
    // Route::get('admin/zoo/foods-consum', [FoodsConsumAdminController::class, 'index'])->name('foods-consum.index');

    Route::post('admin/zoo/foods-consum/create', [FoodsConsumAdminController::class, 'create'])->name('foods-consum.create');
    Route::get('admin/zoo/foods-consum/create', [FoodsConsumAdminController::class, 'createForm'])->name('foods-consum.createForm');

    Route::get('admin/zoo/veterinarian-reports', [VeterinarianReportsAdminController::class, 'index'])->name('veterinarian-reports');
    Route::post('admin/zoo/veterinarian-reports/create', [VeterinarianReportsAdminController::class, 'create'])->name
    ('veterinarian-reports.create');
    Route::get('admin/zoo/veterinarian-reports/create', [VeterinarianReportsAdminController::class, 'createForm'])
        ->name('veterinarian-reports.createForm');

    Route::get('/admin/zoo', [ZooAdminController::class, 'index'])->name('zoo.index');
    Route::get('/admin/zoo/create', [ZooAdminController::class, 'createForm' ])->name('zoo.createForm');
    Route::post('/admin/zoo/create', [ZooAdminController::class, 'create'])->name('zoo.create');
    Route::delete('/admin/zoo/{name}', [ZooAdminController::class, 'show'])->name('zoo.show');
});

Route::get('api/admin/zoo/reviews', [ReviewsController::class, 'index'])->name('reviews.index');
Route::get('api/admin/zoo/reviews/{id}', [ReviewsAdminController::class, 'show'])->name('reviews.show');
Route::post('api/admin/zoo/reviews/create', [ReviewsController::class, 'create'])->name('reviews.create');
Route::patch('api/admin/zoo/reviews/edit/{id}', [ReviewsAdminController::class, 'update'])->name('reviews.update');

Route::get('api/admin/zoo/foods-consum/animal/{animal}', [FoodsConsumAdminController::class, 'getFoodConsumedByAnimal'])
    ->name('foods-consum.animal');
