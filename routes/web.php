<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CrewMemberController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\DestinationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/destinations', [DestinationController::class, 'index'])->name('list_destinations');
    Route::get('/destinations/create', [DestinationController::class, 'create'])->name('create_destination');
    Route::post('/destinations', [DestinationController::class, 'store'])->name('store_destination');
    Route::get('/destinations/{id}/edit', [DestinationController::class, 'edit'])->name('edit_destination');
    Route::put('/destinations/{id}', [DestinationController::class, 'update'])->name('update_destination');
    Route::delete('/destinations/{id}', [DestinationController::class, 'destroy'])->name('destroy_destination');

    Route::get('/crew_members', [CrewMemberController::class, 'index'])->name('list_crew_members');
    Route::get('/crew_members/create', [CrewMemberController::class, 'create'])->name('create_crew_member');
    Route::post('/crew_members', [CrewMemberController::class, 'store'])->name('store_crew_member');
    Route::get('/crew_members/{id}/edit', [CrewMemberController::class, 'edit'])->name('edit_crew_member');
    Route::put('/crew_members/{id}', [CrewMemberController::class, 'update'])->name('update_crew_member');
    Route::delete('/crew_members/{id}', [CrewMemberController::class, 'destroy'])->name('destroy_crew_member');

    Route::get('/technologies', [TechnologyController::class, 'index'])->name('list_technologies');
    Route::get('/technologies/create', [TechnologyController::class, 'create'])->name('create_technology');
    Route::post('/technologies', [TechnologyController::class, 'store'])->name('store_technology');
    Route::get('/technologies/{id}/edit', [TechnologyController::class, 'edit'])->name('edit_technology');
    Route::put('/technologies/{id}', [TechnologyController::class, 'update'])->name('update_technology');
    Route::delete('/technologies/{id}', [TechnologyController::class, 'destroy'])->name('destroy_technology');
});

require __DIR__.'/auth.php';