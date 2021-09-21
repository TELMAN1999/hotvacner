<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UsersController;

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

//Route::get('/', function () {
////    $articles= DB::table('article')->get();
////    return view('welcome', compact('articles'));
////});
Route::get('/',[MainController::class, 'welcome']);

Route::get('/new_author', [MainController ::class, 'newAR']);

Route::get('/search', [MainController ::class, 'searchPHP']);

Route::get('/edit', [MainController ::class, 'editPHP']);

Route::post('/new_author', [UsersController::class, 'store'])
    ->name('new_author');

Route::post('/edit', [UsersController::class, 'edit'])
    ->name('edit');

Route::post('/', [UsersController::class, 'delete'])
    ->name('delete');

Route::post('/search', [UsersController::class, 'search'])
    ->name('search');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

