<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return match($request->r) {
            UserStatus::PEMBELI->value => $this->userPembeli(),
            UserStatus::PENJUAL->value => $this->userPenjual(),
            default => back()
        };
    }

    private function userPembeli()
    {
        return view('pages.admin.data-users', [
            'users' => User::where('status', UserStatus::PEMBELI)->get()
        ]);
    }

    private function userPenjual()
    {
        return view('pages.admin.data-sellers', [
            'users' => User::with('toko')->withCount('produks')->where('status', UserStatus::PENJUAL)->get()
        ]);
    }

    public function profil()
    {
        return match(Auth::user()->status) {
            UserStatus::ADMIN => $this->profilAdmin(),
            UserStatus::PEMBELI => $this->profilPembeli(),
            UserStatus::PENJUAL => $this->profilPenjual()
        };
    }

    private function profilAdmin()
    {
        return view('pages.admin.profile');
    }

    private function profilPembeli()
    {
        return view('pages.buyer.profile');
    }

    private function profilPenjual()
    {
        return view('pages.seller.profile');
    }
}
