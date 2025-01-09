<?php

namespace App\Http\Controllers;

use App\Models\GameImage;
use Illuminate\Http\Request;

class GameImageController extends Controller
{
    public function index()
    {
        $images = GameImage::all();
        return response()->json($images);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'image_path' => 'required|string',
        ]);

        $image = GameImage::create($validated);
        return response()->json($image, 201);
    }

    public function show(GameImage $gameImage)
    {
        return response()->json($gameImage);
    }

    public function update(Request $request, GameImage $gameImage)
    {
        $validated = $request->validate([
            'image_path' => 'string',
        ]);

        $gameImage->update($validated);
        return response()->json($gameImage);
    }

    public function destroy(GameImage $gameImage)
    {
        $gameImage->delete();
        return response()->json(['message' => 'Game image deleted']);
    }
}
