<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index() {
        return view('admin', [
            'users' => \App\Models\User::all(),
            'requests' => \App\Models\Request::all(),
        ]);
    }

    public function blockUser($id) {
        $user = \App\Models\User::find($id);
        if($user->blocked === 0 && $user->role !== "Admin"){
            $user->update(['blocked' => 1]);
        } elseif($user->blocked === 1) {
            $user->update(['blocked' => 0]);
        }
        return redirect()->back();
    }
}
