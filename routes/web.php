<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MountainsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/', [HomepageController::class, 'index'])
    ->name('homepage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::prefix('mountains')->group(function () {
    Route::get('/{id}', [MountainsController::class, 'mountain'])
        ->whereNumber('id')
        ->name('mountains.mountain');

    Route::get('/{id}/snowdays', [MountainsController::class, 'snowdays'])
        ->whereNumber('id')
        ->name('mountains.snowdays');

    Route::get('/{id}/leaderboard', [MountainsController::class, 'leaderboard'])
        ->whereNumber('id')
        ->name('mountains.leaderboard');
});

Route::prefix('members')->group(function () {
    Route::get('/{id}', [UsersController::class, 'user'])
        ->whereNumber('id')
        ->name('users.user');

    Route::get('/{id}/mountains', [UsersController::class, 'mountains'])
        ->whereNumber('id')
        ->name('users.mountains');


    Route::get('/{id}/mountains/{mountainId}', [UsersController::class, 'mountain'])
        ->whereNumber('id')
        ->whereNumber('mountainId')
        ->name('users.mountain');

    Route::get('/{id}/seasons', [UsersController::class, 'seasons'])
        ->whereNumber('id')
        ->name('users.seasons');

    Route::get('/{id}/seasons/compare', [UsersController::class, 'seasonsCompare'])
        ->whereNumber('id')
        ->name('users.seasons.compare');

    Route::get('/{id}/snowdays', [UsersController::class, 'snowdays'])
        ->whereNumber('id')
        ->name('users.snowdays');

    Route::get('/{id}/following', [UsersController::class, 'following'])
        ->whereNumber('id')
        ->name('users.following');
});