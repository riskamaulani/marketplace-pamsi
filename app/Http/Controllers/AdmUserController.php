<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembeliModel;

class AdmUserController extends Controller
{
    public function pembeli()
    {
        $data['pembeli'] = PembeliModel::get();

        return view('Admin/data-users', $data);
    }
}
