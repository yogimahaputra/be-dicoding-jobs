<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::resource('vacancies', VacancyController::class);
    Route::get('vacancies-search', [VacancyController::class, 'search']);
    Route::resource('positions', PositionController::class);
    Route::resource('locations', LocationController::class);
});
