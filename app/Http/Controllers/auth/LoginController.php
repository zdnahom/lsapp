<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // dd($request->remember);
        //Validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // sign in
       if(!Auth::attempt($request->only('email','password'),$request->remember)){
           return back()->with('status','Invalid login');
       }
        return redirect()->route('dashboard');       
    }
}
