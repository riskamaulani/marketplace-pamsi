<?php

namespace App\Http\Controllers;

use App\Actions\ChangePassword;
use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\RegisterNewUser;
use App\Http\Requests\UserAuthenticateRequest;
use App\Http\Requests\UserChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(UserStoreRequest $request, RegisterNewUser $registerNewUser)
    {
        // validate user input
        $request->validated();

        try {
            // register new user (pembeli)
            $user = $registerNewUser->pembeli($request);
        } catch (\Throwable $th) {
            return back()->with('error', 'Registrasi Gagal!');
        }

        return redirect(route('loginpage'))->with('success', 'Registrasi Sukses!');
    }

    public function authenticate(UserAuthenticateRequest $request)
    {
        // validate user input
        $credentials = $request->validated();

        // try to login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('error', 'Username/Password Salah!');
    }

    public function changePassword(UserChangePasswordRequest $request, ChangePassword $changePassword)
    {
        try {
            // try to change password of user
            $changePassword->handle($request, Auth::user());
        } catch (\Throwable $th) {
            return back()->withErrors($th->getMessage());
        }

        return back()->with('success', 'Ganti Password Sukses!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('loginpage'));
    }
}
