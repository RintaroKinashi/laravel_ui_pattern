<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateRecipeController;

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

// 参考：https://note.com/laravelstudy/n/n2fff7a549f4d?magazine_key=mc2430b9e43e2

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/recipe/create', [CreateRecipeController::class, "create"])
    ->name("create_recipe");

Route::post('/recipe/create', [CreateRecipeController::class, "store"])
    ->name("store_recipe");
