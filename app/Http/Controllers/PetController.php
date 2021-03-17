<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index() {
        return view('pets.index', [
            'pets' => \App\Models\Pet::all(),
        ]);
    }

    public function show($id) {
        return \App\Models\Pet::find($id);
    }
}
