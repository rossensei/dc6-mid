<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('can:make-sales');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('can:create');

    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index')->middleware('can:make-sales');

    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index')->middleware('can:manage');
    Route::get('/clients/view/{client}', [ClientController::class, 'show'])->name('clients.show')->middleware('can:manage');

    Route::get('/users', [UsersController::class, 'index'])->name('users.index')->middleware('can:manage-users');
});

require __DIR__.'/auth.php';
