<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function showUserForm(){
        return view('user.create');
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg,gif',
            'password' => 'required',
        ]);
        return back()->with('message', 'Success! The user has been created.');
        // return dd($request->all());
    }
}
