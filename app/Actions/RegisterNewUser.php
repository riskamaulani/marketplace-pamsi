<?php

namespace App\Actions;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterNewUser
{
    public function pembeli(String $nama, String $username, String $password, String $email, String $nomor_hp): User
    {
        return $this->createUser($nama, $username, $password, $email,$nomor_hp, UserStatus::PEMBELI);
    }

    public function penjual(String $nama, String $username, String $password, String $email = null, String $nomor_hp=null): User
    {
        return $this->createUser($nama, $username, $password, $email,$nomor_hp, UserStatus::PENJUAL);
    }

    private function createUser(String $nama, String $username,String $nomor_hp, String $password, String $email, UserStatus $status): User
    {
        // create new user
        $user = User::create([
            'nama' => $nama,
            'username' => $username,
            'nomor_hp' => $nomor_hp,
            'password' => Hash::make($password),
            'email' => $email,
            'status' => $status,
        ]);

        return $user;
    }
}
