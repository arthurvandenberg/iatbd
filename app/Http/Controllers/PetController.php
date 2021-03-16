<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index() {
        return \App\Models\Pet::all();
    }

    public function show($id) {
        return \App\Models\Pet::find($id);
    }
}
