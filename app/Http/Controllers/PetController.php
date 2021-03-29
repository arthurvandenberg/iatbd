<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class PetController extends Controller
{
    public function index() {
        return view('pets.index', [
            'pets' => \App\Models\Pet::all(),
        ]);
    }

    public function show($id) {
        return view('pets.show', [
            'pet' => \App\Models\Pet::find($id),
            'owner' => \App\Models\Pet::find($id)->getOwner,
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
        ]);



        $pet = Pet::create([
            'owner_id' => Auth::id(),
            'name' => $request->name,
            'kind' => $request->kind,
            'description' => $request->description,
            'available_date' => $request->availableDate,
            'end_of_stay' => $request->endOfStay,
            'compensation_amount' => $request->compensationAmount
        ]);

        event(new Registered($pet));

        return redirect('/dashboard');
    }
}
