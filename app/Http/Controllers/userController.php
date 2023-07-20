<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    public function showUserForm(){
        return view('user.create');
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg,gif|max:10000', 
            'password' => 'required',
        ]);

        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);

        DB::table('users')->insert([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $validatedData['phone'],
            'photo' => $imageName,
        ]);

        return redirect('/')->with('message', 'Registration successful!');
    }


    public function index()
    {
        $users = User::all();
        return view('user.show', compact('users'));
    }

    public function showDetailes($id){

        $user = User::findOrFail($id);
        return view('user.showDetails', compact('user'));
    }

    public function showEdit($id){
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg,gif|max:10000',
            'password' => 'required',
        ]);

        // Update the user data
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);

        // Handle photo update if a new photo is provided
        if ($request->hasFile('photo')) {
            // Delete old photo from folder
            Storage::delete('images/' . $user->photo);

            // Move the new photo to the 'images' folder
            $imageName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $imageName);

            // Update the user's photo field in the database
            $user->photo = $imageName;
        }

        // Save the updated user data to the database
        $user->save();

        return redirect('/')->with('message', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Delete the user's photo
        Storage::delete('images/' . $user->photo);

        $user->delete();
        return redirect('/')->with('message', 'User deleted successfully!');
    }

}
