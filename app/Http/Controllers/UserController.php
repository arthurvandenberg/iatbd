<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return \App\Models\User::all();
    }

    public function show($id) {
        return \App\Models\User::find($id);
    }
}
