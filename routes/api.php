<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SessionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('auth')->group(function () {
  Route::post('/register', [AccountController::class, 'register']);
  Route::post('/login', [AccountController::class, 'login']);
  Route::get('/logout', [AccountController::class, 'logout'])->middleware(['auth:api']);
});


Route::middleware(['auth:api'])->group(function () {
  Route::apiResources([
    'events' => EventController::class,
    'sessions' => SessionController::class,
  ]);
});