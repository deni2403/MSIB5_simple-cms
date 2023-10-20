<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;

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

Auth::routes();


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'inactivity']);

Route::get('/dashboard/{news}', [DashboardController::class, 'show'])->middleware(['auth', 'inactivity']);
Route::resource('/dashboard', DashboardController::class)->middleware(['auth', 'inactivity']);


Route::get('/news/checkSlug', [NewsController::class, 'checkSlug'])->middleware(['auth', 'inactivity']);
Route::resource('/news', NewsController::class)->middleware(['auth', 'inactivity']);

Route::get('/profile', function () {
    return view('profile', [
        'title' => 'Profile Page',
    ]);
})->middleware(['auth', 'inactivity']);
