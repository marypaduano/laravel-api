<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');

Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('projects', ProjectController::class)->parameters([
        'projects' => 'project:slug'
    ]);
});

require __DIR__.'/auth.php';
