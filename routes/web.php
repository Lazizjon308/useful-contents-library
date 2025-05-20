<?php

use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\AuthorController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ContentController;
use App\Http\Controllers\Web\GenreController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User management routes
    Route::resource('users', UserController::class);
});

// Content-related routes group
Route::middleware('auth')->prefix('content')->group(function () {
    // Authors routes
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/authors/{author}', [AuthorController::class, 'show'])->name('authors.show');
    Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
    Route::put('/authors/{author}', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');

    // categories routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

    // Contents routes
    Route::get('/contents', [ContentController::class, 'index'])->name('contents.index');
    Route::get('/contents/{content}', [ContentController::class, 'show'])->name('contents.show');
    Route::post('/contents', [ContentController::class, 'store'])->name('contents.store');
    Route::put('/contents/{content}', [ContentController::class, 'update'])->name('contents.update');
    Route::delete('/contents/{content}', [ContentController::class, 'destroy'])->name('contents.destroy');
    Route::get('/contents/create', [ContentController::class, 'create'])->name('contents.create');
    Route::get('/contents/{content}/edit', [ContentController::class, 'edit'])->name('contents.edit');

    // Genres routes
    Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');
    Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
    Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
    Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');
    Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
    Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');

    //Users routes
    Route::get('/users',[UserController::class,'index'])->name('content.users.index');
});

// Also provide non-prefixed routes for backward compatibility
Route::middleware('auth')->group(function () {
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index.legacy');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index.legacy');
    Route::get('/contents', [ContentController::class, 'index'])->name('contents.index.legacy');
    Route::get('/genres', [GenreController::class, 'index'])->name('genres.index.legacy');
});
require __DIR__.'/auth.php';
