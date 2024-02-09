<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create(
            [
                'nama' => 'Makanan'
            ],
        );
        Kategori::create(
            [
                'nama' => 'Minuman'
            ],
        );
        Kategori::create(
            [
                'nama' => 'Kerajinan'
            ],
        );
        Kategori::create(
            [
                'nama' => 'Jasa'
            ],
        );
        Kategori::create(
            [
                'nama' => 'Pakaian'
            ],
        );
        Kategori::create(
            [
                'nama' => 'Aksesoris'
            ],
        );
        Kategori::create(
            [
                'nama' => 'Lukisan'
            ],
        );
        Kategori::create(
            [
                'nama' => 'ATK'
            ],
        );
        Kategori::create(
            [
                'nama' => 'Kosmetik'
            ],
        );
    }
}
