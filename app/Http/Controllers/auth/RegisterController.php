<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //Validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        //Store on our database
         
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>Hash::make($request->password), 
        ]);
        //Sign in a user
        Auth::attempt($request->only('email','password'));
        return redirect()->route('dashboard');        
    }
}
