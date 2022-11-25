<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view("dashboard");
    }
    public function handleLogin()
    {
        return view("login");
    }
    public function handleRegister()
    {
        return view("register");
    }
    public function registerUser(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users', //db-table name
            'password' => 'required',
        ]);
        //-----------using model
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);
        return redirect('/login');

        // ------without model
        // $newUser = new Project();
        // $newUser->name = $req->name;
        // $newUser->email = $req->email;
        // $newUser->password = Hash::make($req->password);
        // $newUser->save();
        // return redirect("/login");
    }

    public function login(Request $req)
    {
        // dd($req->all());
        $req->validate([
            'email' => 'required|email', //db-table name
            'password' => 'required',
        ]);

        if (Auth::attempt($req->only('email', 'password'))) {
            // dd('log in');
            return redirect()->route('home');
        } else {
            // dd("use not found");

            return back()->with('fail', "User Not Found!");
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}