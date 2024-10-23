<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Token;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Show all tokens for the authenticated user
    public function index(Request $request) {
        // Get tokens for the authenticated user
        return $request->user()->tokens;
    }

    // Revoke a token
    public function destroy($tokenId) {
        $token = Token::findOrFail($tokenId);

        // Revoke the token
        $token->revoke();

        return response()->json(['message' => 'Token revoked'], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
}
