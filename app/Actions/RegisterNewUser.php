<?php

namespace App\Actions;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterNewUser
{
    public function pembeli(String $nama, String $username, String $password, String $email): User
    {
        return $this->createUser($nama, $username, $password, $email, UserStatus::PEMBELI);
    }

    public function penjual(String $nama, String $username, String $password, String $email = null): User
    {
        return $this->createUser($nama, $username, $password, $email, UserStatus::PENJUAL);
    }

    private function createUser(String $nama, String $username, String $password, String $email, UserStatus $status): User
    {
        // create new user
        $user = User::create([
            'nama' => $nama,
            'username' => $username,
            'password' => Hash::make($password),
            'email' => $email,
            'status' => $status,
        ]);

        return $user;
    }
}
