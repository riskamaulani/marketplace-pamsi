<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopProfileUpdateRequest;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{
    public function index()
    {
        return view('pages.admin.shop.index');
    }

    public function show(Shop $shop)
    {
        return view('pages.shop', [
            'shop' => $shop
        ]);
    }

    public function edit()
    {
        // $shop = Auth::user()->shop;
        // dd(json_decode($shop->manager));

        return view('pages.admin.shop.profile', [
            'shop' => Auth::user()->shop
        ]);
    }

    public function update(ShopProfileUpdateRequest $request, Shop $shop)
    {
        $shop->fill($request->validated());
        $shop->verify = true;
        $shop->save();

        return Redirect::back();
    }
    
}
