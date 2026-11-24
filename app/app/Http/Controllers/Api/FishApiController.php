<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use Illuminate\Http\Request;

class FishApiController extends Controller
{
    public function index()
    {
        $fishes = Fish::with('user:id,name,email,status')->orderBy('created_at', 'desc')->get();
        return response()->json($fishes);
    }

    public function show($id)
    {
        $fish = Fish::with('user:id,name,email,status')->find($id);
        if (!$fish) {
            return response()->json(['message' => 'Złów nie został znaleziony.'], 404);
        }
        return response()->json($fish);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
            'fish_species' => 'required|string|max:255',
            'catch_weight' => 'required|numeric|min:0',
            'catch_date' => 'required|date',
            'photo_path' => 'nullable|string',
        ]);

        $fish = new Fish();
        $fish->user_id = $request->user()->id;
        $fish->location = $validated['location'];
        $fish->fish_species = $validated['fish_species'];
        $fish->catch_weight = $validated['catch_weight'];
        $fish->catch_date = $validated['catch_date'];
        $fish->photo_path = $request->input('photo_path', 'https://images.unsplash.com/photo-1544947950-fa07a98d237f');
        $fish->save();

        return response()->json($fish->load('user:id,name,email,status'), 201);
    }

    public function update(Request $request, $id)
    {
        $fish = Fish::find($id);
        if (!$fish) {
            return response()->json(['message' => 'Złów nie został znaleziony.'], 404);
        }

        if ($request->user()->id !== $fish->user_id && $request->user()->status !== 'admin') {
            return response()->json(['message' => 'Brak uprawnień do edycji tego wpisu.'], 403);
        }

        $validated = $request->validate([
            'location' => 'sometimes|required|string|max:255',
            'fish_species' => 'sometimes|required|string|max:255',
            'catch_weight' => 'sometimes|required|numeric|min:0',
            'catch_date' => 'sometimes|required|date',
            'photo_path' => 'nullable|string',
        ]);

        $fish->fill($validated);
        $fish->save();

        return response()->json($fish->load('user:id,name,email,status'));
    }

    public function destroy(Request $request, $id)
    {
        $fish = Fish::find($id);
        if (!$fish) {
            return response()->json(['message' => 'Złów nie został znaleziony.'], 404);
        }

        if ($request->user()->id !== $fish->user_id && $request->user()->status !== 'admin') {
            return response()->json(['message' => 'Brak uprawnień do usunięcia tego wpisu.'], 403);
        }

        $fish->delete();
        return response()->json(['message' => 'Wpis połowu usunięty pomyślnie.']);
    }
}
