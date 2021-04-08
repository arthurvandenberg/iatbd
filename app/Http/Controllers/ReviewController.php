<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use DB;

class ReviewController extends Controller
{
    public function index($user_id){
        return view('review.index', [
            'user' => \App\Models\User::find($user_id),
            'reviews' => \App\Models\User::find($user_id)->getReviewsOfUser->sortByDesc('created_at'),
        ]);
    }

    public function create($user_id, $pet_id){
        return view('review.create', [
            'user' => \App\Models\User::find($user_id),
            'pet' => \App\Models\Pet::find($pet_id),
        ]);
    }

    public function store(Request $request, $request_id){

        $request->validate([
            'title' => 'required|string|max:255',
            'review' => 'required',
            'reviewed_user' => 'required',
            'author' => 'required',
        ]);

        $review = Review::create([
            'title' => $request->title,
            'review' => $request->review,
            'reviewed_user' => $request->reviewed_user,
            'author' => $request->author,
        ]);

        event(new Registered($review));

        $sit_request = \App\Models\Request::find($request_id);
        $listing = \App\Models\Request::find($request_id)->getListing;
        $sit_request->update(['reviewed' => 1]);
        $sit_request->delete();
        $listing->delete();

        return redirect('/dashboard')->with('review_create_success', 'Review opgeslagen!');
    }
}
