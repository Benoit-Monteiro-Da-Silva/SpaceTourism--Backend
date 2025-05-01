<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CrewMemberController;
use App\Http\Controllers\Api\TechnologyController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Middleware\BlockLateHours;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/destinations', [DestinationController::class, 'index']);
Route::get('/destinations/{id}', [DestinationController::class, 'show']);

Route::get('/crew-members', [CrewMemberController::class, 'index']);
Route::get('/crew-members/{id}', [CrewMemberController::class, 'show']);

Route::get('/technologies', [TechnologyController::class, 'index']);
Route::get('/technologies/{id}', [TechnologyController::class, 'show']);