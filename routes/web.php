<?php

use App\Http\Controllers\ChartsController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\RecurrenceController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resources([
        'groups' => GroupController::class,
        'expense' => ExpenseController::class
    ]);
    Route::get('group/{group}/settings', [GroupController::class, 'settings'])->name('groups.settings');
    Route::get('group/{group}/recurrence', [GroupController::class, 'recurrence'])->name('groups.recurrence');
    Route::get('group/{group}/members', [GroupController::class, 'members'])->name('groups.members');
    Route::put('recurrence/{recurrence}', [RecurrenceController::class, 'update'])->name('recurrence.update');
    Route::post('recurrence', [RecurrenceController::class, 'store'])->name('recurrence.store');


    Route::get('group/{group}/charts', [ChartsController::class, 'index'])->name('charts.index');
});




require __DIR__ . '/auth.php';
