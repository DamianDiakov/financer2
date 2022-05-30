<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\GroupController;
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

    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/groups/{group:id}', [GroupController::class, 'show'])->name('groups.show');
    Route::post('/update/{expense}', [ExpenseController::class, 'update'])->name('expense.update');
    Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');
    Route::delete('/expense/{expense}', [ExpenseController::class, 'destroy'])->name('expense.delete');
});




require __DIR__ . '/auth.php';
