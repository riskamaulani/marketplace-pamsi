<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'admin') {
            return view('dashboard');
        }

        if(!$user->shop->verify) {
            return redirect()->route('shop.edit');
        }

        return view('dashboard');
    }

    public function home()
    {
        return view('pages.home', [
            'categories' => Category::select('id', 'name')->orderBy('name')->get()
        ]);
    }
}
