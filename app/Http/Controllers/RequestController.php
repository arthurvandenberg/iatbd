<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        ]);

        event(new Registered($pet_request));

        return redirect('/dashboard');
    }
}
