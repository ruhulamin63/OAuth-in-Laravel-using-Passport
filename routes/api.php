<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::post('/register', function (Request $request) {
//    $request->validate([
//        'name' => 'required|string',
//        'email' => 'required|string|email|unique:users',
//        'password' => 'required|string|confirmed',
//    ]);

    $user = new App\Models\User([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);
    $user->save();

    return response()->json(['message' => 'Successfully created user!'], 201);
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (auth()->attempt($credentials)) {
        $user = auth()->user();
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        return response()->json(['token' => $token], 200);
    } else {
        return response()->json(['error' => 'Unauthorized'], 401);
    }
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

