<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required'],
            'email' => ['required'],
            'username' => ['required'],
            'password' => ['required']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        if (count(User::where('username', $validatedData['username'])->get()) > 0) {
            return back()->with('error', 'Username Sudah Digunakan!');
        }


        $user = User::create($validatedData);
        dd(User::where('username', $user->username)->get('id'));
        $user->pembeli()->create(['id' => User::where('username', $user->username)->get('id')]);
        return redirect(route('loginpage'))->with('success', 'Registrasi Sukses!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('error', 'Username/Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('home'));
    }
}
