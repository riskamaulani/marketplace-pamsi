<?php

namespace App\Http\Controllers;

use App\Actions\ChangePassword;
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
            $user = $registerNewUser->pembeli(
                $request->nama,
                $request->username,
                $request->password,
                $request->email
            );
        } catch (\Throwable $th) {
            notify()->error('Pendaftaran gagal, silahkan coba lagi.', 'Registrasi Gagal!');
            return back();
        }

        notify()->success('Berhasil melakukan pendaftaran', 'Registrasi Sukses!');
        return redirect(route('loginpage'));
    }

    public function authenticate(UserAuthenticateRequest $request)
    {
        // validate user input
        $credentials = $request->validated();

        // try to login
        if (Auth::attempt($credentials)) {
            // login success
            notify()->success('Selamat datang, ' . Auth::user()->nama, 'Login Sukses!');
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        // login failed
        notify()->error('Username/Password salah.', 'Login Gagal!');
        return back();
    }

    public function changePassword(UserChangePasswordRequest $request, ChangePassword $changePassword)
    {
        try {
            // try to change password of user
            $changePassword->handle(
                $request->current_password,
                $request->new_password
            );
        } catch (\Throwable $th) {
            notify()->error($th->getMessage(), 'Update Password Gagal!');
            return back();
        }

        notify()->success('Password berhasil diupdate', 'Sukses!');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('loginpage'));
    }
}
