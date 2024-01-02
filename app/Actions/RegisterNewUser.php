<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterNewUser
{
    public function pembeli($request): User
    {
        // hash password user
        $password = Hash::make($request->password);

        // create new user
        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $password,
            'email' => $request->email ?? null,
        ]);

        return $user;
    }
}
