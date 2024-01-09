<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // create account pembeli
        User::create([
            'nama' => 'pembeli',
            'username' => 'pembeli',
            'password' => Hash::make('pembeli'),
            'email' => 'pembeli@email.com',
            'status' => UserStatus::PEMBELI
        ]);

        // create account penjual
        $penjual = User::create([
            'nama' => 'penjual',
            'username' => 'penjual',
            'password' => Hash::make('penjual'),
            'email' => 'penjual@email.com',
            'status' => UserStatus::PENJUAL
        ]);

        // create toko penjual
        $penjual->toko()->create([
            'nama' => 'audi cell'
        ]);

        // create account admin
        User::create([
            'nama' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'email' => 'admin@email.com',
            'status' => UserStatus::ADMIN
        ]);
    }
}
