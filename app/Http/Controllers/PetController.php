<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index() {
        return view('pet.index', [
            'pets' => \App\Models\Pet::all(),
        ]);
    }

    public function show($id) {
        return view('pet.show', [
            'pet' => \App\Models\Pet::find($id),
            'owner' => \App\Models\Pet::find($id)->getOwner,
            'listings' => \App\Models\Pet::find($id)->getListings,
        ]);
    }

    public function destroy($id){
        $pet = Pet::find($id);
        $pet->delete();

        return redirect('/dashboard');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('img/pets'), $imageName);


        $pet = Pet::create([
            'owner_id' => Auth::id(),
            'name' => $request->name,
            'kind' => $request->kind,
            'image' => asset('img/pets/'.$imageName),
            'description' => $request->description,
        ]);

        event(new Registered($pet));

        return redirect('/dashboard');
    }
}
