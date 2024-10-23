<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Passport\Client;

class ClientController extends Controller
{
    // Show all clients
    public function index() {
        // Get all clients
        return Client::all();
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
    // Create a new client
    public function store(Request $request) {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'redirect' => 'required|url'
        ]);

        // Create a new OAuth client
        $client = Client::create([
            'name' => $validated['name'],
            'redirect' => $validated['redirect'],
            'personal_access_client' => false,
            'password_client' => true,
            'revoked' => false
        ]);

        return response()->json($client, 201);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
