<?php

use App\Http\Controllers\Api\PropertyApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public: list properties with filters and pagination
Route::get('/properties', [PropertyApiController::class, 'index']);

// Optional: protected route example (requires Sanctum token)
Route::middleware('auth:sanctum')->get('/properties/favorites', function (Request $request) {
    return $request->user()->favorites()->with('images')->get();
});
