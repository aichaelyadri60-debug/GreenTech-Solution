<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    /**
     * ShowLogin.
     */
    public function ShowLogin()
    {
        if(Auth::check()){
            return redirect()->route('products.index');
        }
        return view('auth.login');
    }

    /**
     * ShowRegister.
     */
    public function ShowRegister()
    {
        return view('auth.register');
    }

    /**
     * Register.
     */
    public function Register(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|email',
            'password' =>'required|min:6|confirmed'
        ]);


        User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password' =>Hash::make($request->password)
        ]);


        return redirect()->route('login')->with('success' ,'vous avez enregistrer avec success');
    }

    /**
     *Login.
     */
    public function Login(Request $request)
    {
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6'
        ]);

        if(Auth::attempt($request->only('email' ,'password'))){
            return redirect('/');
        }


        return back()->withErrors(['email' => 'email ou password invalide.']);
    }

    /**
     * Logout.
     */
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
