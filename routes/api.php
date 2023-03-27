<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\GroupController;

//This handles all account concerns
Route::prefix('auth')->group(function () {
  Route::post('/register', [AccountController::class, 'register']);
  Route::post('/login', [AccountController::class, 'login']);
  Route::get('/logout', [AccountController::class, 'logout'])->middleware(['auth:api']);
});


//this handles all the work XD
Route::middleware(['auth:api'])->group(function () {
  Route::apiResources([
    'events' => EventController::class,
    'sessions' => SessionController::class,
    'venues' => VenueController::class,
    'groups' => GroupController::class,
  ]);

  Route::prefix('venue')->group(function () {
    Route::get('/search', [VenueController::class, 'search_venue']);
  });

  Route::prefix('event')->group(function () {
      Route::get('/search', [EventController::class, 'search_event']);
  });
});