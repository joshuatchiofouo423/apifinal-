<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/apiUsers/storeUsers', [UserController::class, 'store'])->name('store'); // Enregistrer l'utilisateur
Route::get('/apiUsers/showUsers', [UserController::class, 'show'])->name('show.users'); // Afficher les utilisateurs
Route::post('/apiUsers/searchUsers', [UserController::class, 'search'])->name('search'); // chercher les utilisateurs
Route::post('/apiUsers/researchUsers', [UserController::class, 'research'])->name('research'); // chercher les utilisateurs
