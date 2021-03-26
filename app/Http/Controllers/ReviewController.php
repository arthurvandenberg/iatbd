<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index($user_id){
        return view('review.index', [
            'user' => \App\Models\User::find($user_id),
            'reviews' => \App\Models\User::find($user_id)->getReviewsOfUser,
        ]);
    }

    public function create($user_id, $pet_id){
        return view('review.create', [
            'user' => \App\Models\User::find($user_id),
            'pet' => \App\Models\Pet::find($pet_id),
        ]);
    }

    public function store(Request $request){}
}
