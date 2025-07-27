<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

// =======================
// AUTHENTICATION ROUTES
// =======================
Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// AUTHENTICATED USERS
// =======================

Route::middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'home'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');

    // Buku bisa dilihat semua user login
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::resource('genres', GenreController::class)->except(['show']); // semua method kecuali show
});

// =======================
// ADMIN ROUTES
// =======================

Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::resource('books', BookController::class)->except(['index', 'show']);
    Route::resource('categories', CategoryController::class);
    Route::resource('genre', GenreController::class)->except(['index']);
    Route::delete('/genre/{id}', [GenreController::class, 'destroy'])->name('genre.destroy');

});

// =======================
// USER ROUTES
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::resource('genres', GenreController::class)->except(['show']);
});




// Route yang bisa diakses semua user login
Route::middleware(['auth'])->group(function () {
    Route::get('/genre', [GenreController::class, 'index'])->name('genre.index');
});
// BUAT PROFILE (Create Form)
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');



// SIMPAN PROFILE (POST)
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

// EDIT PROFILE (Form)
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// UPDATE PROFILE (PUT)
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::post('/books/{book}/comments', [CommentController::class, 'store'])->middleware('auth');
Route::post('/books/{book}/comments', [CommentController::class, 'store'])->name('comments.store');