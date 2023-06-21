<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BookmarkController;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [SearchController::class, 'index'])->name('home.index');
Route::get('/search', [SearchController::class, 'search'])->name('home.search');
Route::get('/search/{word}/store', [SearchController::class, 'store']);

Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/history/{word}', [HistoryController::class, 'show'])->name('history.search');
Route::get('/history/{id}', [HistoryController::class, 'destroy'])->name('history.destroy');

Route::get('/bookmark', [BookmarkController::class, 'index'])->name('bookmark.index');
Route::get('/bookmark/{word}', [BookmarkController::class, 'show']);
Route::get('/bookmark/{id}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
