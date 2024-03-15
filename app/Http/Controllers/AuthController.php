<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }

    public function registerProcess(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);
        return redirect()->route('login')->with(['success' => 'Registrasi Berhasil']);
    }

    public function loginProcess(Request $request){
        $validator = Validator::make($request->all(), [
            'email' =>'required|email|unique:|users',
            'password' => Hash::make($request->password),
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password]))
            {
            return redirect()->route('dashboard')->with(['success' => 'Login Berhasil']);
        } else {
            return redirect()->back()->with(['error' => 'Email atau Password Salah']);
        }
    }

}

