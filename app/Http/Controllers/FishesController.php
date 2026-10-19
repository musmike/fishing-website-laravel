<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;

class FishesController extends Controller
{
    public function index()
    {
        $fishes = Fish::orderBy('created_at', 'asc')->get();
        return view('fishes', ['fishes' => $fishes]);
    }

    public function create()
    {

        $fish = new Fish;

        return view('fishesForm', ['fish' => $fish]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'location' => 'required',
            'fish_species' => 'required',
            'catch_weight' => 'required|min:0|regex:/^[0-9]+([\.,][0-9]+)?$/',
            'catch_date' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fish = new Fish();

        $fish->user_id = \Auth::user()->id;
        $fish->location = $request->input('location');
        $fish->fish_species = $request->input('fish_species');
        $weight = $request->input('catch_weight');
        $fish->catch_weight = str_replace(',', '.', $weight);
        $fish->catch_date = $request->input('catch_date');
        $photoPath = $request->file('photo')->store('images', 'public');
        $fish->photo_path = $photoPath;

        if ($fish->save()) {
            return redirect('fishes');
        }
        return view('fishes');
    }

    public function edit(string $id)
    {
        $fish = Fish::find($id); 

        if (\Auth::user()->id != $fish->user_id && \Auth::user()->status != 'admin') {
            return back()->with(['success' => false, 'message_type' => 'danger', 
                'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }

        return view('fishesEditForm', ['fish'=>$fish]);
    }


    public function update(Request $request, string $id)
    {
        $fish = Fish::find($id);

        if (\Auth::user()->id != $fish->user_id && \Auth::user()->status != 'admin') {
            return back()->with(['success' => false, 'message_type' => 'danger',
            'message' => 'Nie posiadasz uprawnień do przeprowadzenia tej operacji.']);
        }

        $this->validate($request, [
            'location' => 'required',
            'fish_species' => 'required',
            'catch_weight' => 'required|min:0|regex:/^[0-9]+([\.,][0-9]+)?$/',
            'catch_date' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fish->location = $request->input('location');
        $fish->fish_species = $request->input('fish_species');
        $weight = $request->input('catch_weight');
        $fish->catch_weight = str_replace(',', '.', $weight);
        $fish->catch_date = $request->input('catch_date');
        $photoPath = $request->file('photo')->store('images', 'public');
        $fish->photo_path = $photoPath;

        if($fish->save()) {
            return redirect()->route('fishes');
        }

        return "Wystąpił błąd.";
    }

    public function destroy(string $id)
    {

        $fish = Fish::find($id);

        if (\Auth::user()->id != $fish->user_id && \Auth::user()->status != 'admin') {
            return back();
        }
        if($fish->delete()) {
            return redirect()->route('fishes');
        }
        else 
            return back();
    }
}
