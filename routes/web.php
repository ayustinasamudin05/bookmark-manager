<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Halaman untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);
});

// Halaman yang hanya dapat diakses setelah login
Route::middleware('auth')->group(function () {
    
Route::get('/dashboard', function () {
    /** @var User $user */
    $user = Auth::user();

    $totalBookmarks = $user->bookmarks()->count();

    $totalCategories = $user->categories()->count();

    $totalFavorites = $user->bookmarks()
        ->where('is_favorite', true)
        ->count();

    $recentBookmarks = $user->bookmarks()
        ->with('category')
        ->latest()
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalBookmarks',
        'totalCategories',
        'totalFavorites',
        'recentBookmarks'
    ));
})->name('dashboard');


    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('categories', CategoryController::class);
    Route::get('/bookmarks/favorites', [BookmarkController::class, 'favorites'])
    ->name('bookmarks.favorites');
    Route::resource('bookmarks', BookmarkController::class);
});