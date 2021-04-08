<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index() {
        return view('listing.index', [
            'listings' => \App\Models\Listing::all(),
        ]);
    }

    public function create($pet_id) {
        return view('listing.create', [
            'pet' => \App\Models\Pet::find($pet_id),
        ]);
    }

    public function store(Request $request){

        $listing = Listing::create([
            'pet_id' => $request->pet_id,
            'available' => true,
            'available_date' => $request->availableDate,
            'end_of_stay' => $request->endOfStay,
            'compensation_amount' => $request->compensationAmount
        ]);

        event(new Registered($listing));

        return redirect('/dashboard')->with('listing_success', 'Aanbod succesvol aangemaakt.');
    }
}
