<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //


    public function create () {
        return view('usercreate');
    }
    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:255',
            'comment' => 'required|string',
            'rating' => 'required|integer',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->reviews()->create([
            'comment' => $request->comment,
            'rating' => $request->rating
        ]);

        return redirect()->back()->with('success','is this okey');
    }

    public function index() {
        $users = User::with('reviews')->get();

        return view('userindex',compact('users'));
    }
}
