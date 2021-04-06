<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user.index', [
            'users' => \App\Models\User::all(),
        ]);
    }

    public function show($id) {
        return view('user.show', [
            'user' => \App\Models\User::find($id),
            'homeImages' => \App\Models\User::find($id)->getHomeImages,
        ]);
    }
}
