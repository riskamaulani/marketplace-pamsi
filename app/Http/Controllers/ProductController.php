<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.admin.product.index');
    }

    public function show(Product $product)
    {
        // Eager load ratings
        $product->load(['rating.user']);

        return view('pages.product-detail', [
            'product' => $product
        ]);
    }
}
