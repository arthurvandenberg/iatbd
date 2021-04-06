<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class RequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|string|max:255',
            'user_id' => 'required|string|max:255',
        ]);

        $pet_request = \App\Models\Request::create([
            'pet_id' => $request->pet_id,
            'user_id' => Auth::id(),
            'listing_id' => $request->listing_id
        ]);

        event(new Registered($pet_request));

        return redirect()->back();
    }

    public function accept($id){
        $request = \App\Models\Request::find($id);
        $listing = \App\Models\Request::find($id)->getListing;
        $request->update(['confirmed' => 1]);
        $listing->update(['available' => 0]);

        return redirect()->back();
    }

    public function finish($id){
        $request = \App\Models\Request::find($id);
        $request->update(['finished' => 1]);

        return redirect()->back();
    }

    public function delete($id){
        $request = \App\Models\Request::find($id);
        if($request->user_id == Auth::id()){
            $request->delete();
        } elseif (Auth::user()->role === 'Admin'){
            $request->delete();
        }
        return redirect()->back();
    }
}
