<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('img/users/'.strtolower(Auth::user()->name).'/home'), $imageName);

        $image = Image::create([
            'user_id' => Auth::id(),
            'image' => asset('img/users/'.strtolower(Auth::user()->name).'/home/'.$imageName),
        ]);

        event(new Registered($image));

        return redirect()->back();
    }

    public function delete($id){
        $user = Image::find($id)->getUser;
        if($user->id === Auth::id()){
            Image::find($id)->delete();
        }
        return redirect()->back();
    }
}
