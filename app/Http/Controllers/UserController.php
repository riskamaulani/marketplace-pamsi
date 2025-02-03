<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->query('rl') == 'seller') {
            return view('pages.admin.user.seller');
        }

        return view('pages.admin.user.index');
    }
}
