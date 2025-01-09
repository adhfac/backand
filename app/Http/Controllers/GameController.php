<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return response()->json($games);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'platform' => 'required|string',
            'genre' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|string',
        ]);

        $game = Game::create($validated);
        return response()->json($game, 201);
    }

    public function show(Game $game)
    {
        return response()->json($game);
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'title' => 'string|max:255',
            'platform' => 'string',
            'genre' => 'string',
            'price' => 'numeric',
            'stock' => 'integer',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|string',
        ]);

        $game->update($validated);
        return response()->json($game);
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return response()->json(['message' => 'Game deleted']);
    }
}
