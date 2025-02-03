<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Shop;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Penjual 1',
            'username' => 'penjual',
            'email' => 'penjual123@gmail.com',
            'password' => Hash::make('penjual123'),
            'role' => 'penjual'
        ]);

        // Create Shop (Provide value for open_schedule)
        Shop::create([
            'manager' => json_encode(["Audi Adyan"]),
            'user_id' => 'USR240500000001',
            'open_schedule' => json_encode(["Monday" => "9 AM - 6 PM", "Tuesday" => "9 AM - 6 PM"]) // Add this field
        ]);

        // Create Products
        Product::factory(1)->create();

        // Insert 10 categories into the 'categories' table
        foreach (range(1, 10) as $index) {
            Category::create([
                'name' => 'Category ' . $index,
            ]);
        }
    }
}
