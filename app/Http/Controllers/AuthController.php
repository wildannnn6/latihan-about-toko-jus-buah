<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('signup-success');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name'     => 'required|max:10',
            'password' => [
                'required',
                'min:3',
            ],
        ]);

        $nim = '2455301194';
        
        if ($request->name == $nim && $request->password == $nim) {
            return redirect()->route('home')->with('success', 'Login berhasil! Selamat datang.');
        } else {
            return redirect()->route('login')
                ->with('error', 'Username atau password salah!')
                ->withInput();
        }
    }
}