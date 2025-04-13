<?php

use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('layouts.home');
})->name('home');

Route::name('posts.')
    ->prefix('posts')
    ->group(
        function () {
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::get('/{post}/show', [PostController::class, 'show'])->name('show');
            Route::get('/create', [PostController::class, 'create'])->name('create')->middleware(['auth', 'is.manager']);
            Route::post('/', [PostController::class, 'store'])->name('store')->middleware(['auth', 'is.manager']);
            Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit')->middleware(['auth', 'is.manager']);
            Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy')->middleware(['auth', 'is.admin']);
            Route::get('/download', [PostController::class, 'download'])->name('download');
        }
    );
Route::middleware(['test.pre', 'test.post'])->name('categories.')
    ->prefix('categories')
    ->group(
        function () {
            Route::get('/', [CategoryPostController::class, 'index'])->name('index');
            Route::get('/{category}', [CategoryPostController::class, 'show'])->name('show')->withoutMiddleware('test.pre');
        }
    );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
