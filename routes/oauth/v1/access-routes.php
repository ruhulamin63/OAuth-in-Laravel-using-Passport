<?php

use App\Http\Controllers\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

// OAuth token routes
Route::get('/oauth/tokens', [TokenController::class, 'index']);  // List all tokens for authenticated user
Route::delete('/oauth/tokens/{tokenId}', [TokenController::class, 'destroy']);  // Revoke a token

