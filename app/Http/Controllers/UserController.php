<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }

    public function form(){
        return view('form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
        ]);

        $user = User::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }



    public function show(){
        $users= User::all();
        return view('show_users')->with('users',$users);
    }

    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $users = User::where('lastname', 'like', "%$keyword%")
                    ->orWhere('firstname', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%")
                    ->orWhere('phone', 'like', "%$keyword%")
                    ->orWhere('user_id', 'like', "%$keyword%")
                    ->get();
        return response()->json($users);

    }

    public function research(Request $request) {
        $keyword = $request->input('keyword');
        $users = User::where('lastname', 'like', "%$keyword%")
                    ->orWhere('firstname', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%")
                    ->orWhere('phone', 'like', "%$keyword%")
                    ->orWhere('user_id', 'like', "%$keyword%")
                    ->get();
                    return view('show_users_search')->with('users',$users);

    }


}
