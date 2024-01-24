<?php

namespace App\Http\Controllers;


use App\Models\Toko;
use App\Models\User;
use App\Enums\UserStatus;
use App\Http\Requests\AddSellerRequest as RequestsAddSellerRequest;
use App\Http\Requests\ProfilTokoUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Request\AddSellerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return match ($request->r) {
            UserStatus::PEMBELI->value => $this->userPembeli(),
            UserStatus::PENJUAL->value => $this->userPenjual(),
            default => back()
        };
    }

    private function userPembeli()
    {
        return view('pages.admin.data-users', [
            'users' => User::where('status', UserStatus::PEMBELI)->get()
        ]);
    }

    private function userPenjual()
    {
        return view('pages.admin.data-sellers', [
            'users' => User::with('toko')->withCount('produks')->where('status', UserStatus::PENJUAL)->get()
        ]);
    }

    public function profil()
    {
        return match (Auth::user()->status) {
            UserStatus::ADMIN => $this->profilAdmin(),
            UserStatus::PEMBELI => $this->profilPembeli(),
            UserStatus::PENJUAL => $this->profilPenjual()
        };
    }

    private function profilAdmin()
    {
        return view('pages.admin.profile');
    }

    private function profilPembeli()
    {
        return view('pages.buyer.profile');
    }

    private function profilPenjual()
    {
        return view('pages.seller.profile', [
            'toko' => auth()->user()->toko
        ]);
    }
    public function add(RequestsAddSellerRequest $request)
    {
        try {

            // tambah penjual
            $penjual = User::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make('penjual'),
                'status' => UserStatus::PENJUAL

            ]);

            //tambah ke toko
            $penjual->toko()->create([
                'nama' => $request->nama,


            ]);
        } catch (\Throwable $th) {
            notify()->error('Penambahan penjual gagal. ' . $th->getMessage(), 'Gagal!');
            return back();
        }

        notify()->success('Penambahan penjual berhasil.', 'Berhasil!');


        return back();
    }

    public function profilToko(ProfilTokoUpdateRequest $request, Toko $toko)
    {
        try {
            if ($toko->foto == null) {
                // save image first
                $foto = $request->file('foto')->store('images-toko');

                // store data
                Toko::create([
                    'foto' => $foto,
                    'nama' => $request->nama,
                    'deskripsi' => $request->deskripsi,
                    'status' => $request->status,
                ]);
            }

            // update image if user want to update
            if ($request->file('foto')) {
                if ($toko->foto) {
                    Storage::delete($toko->foto);
                }
                $toko->foto = $request->file('foto')->store('images-toko');
            }

            // update data for toko model
            $toko->nama = $request->nama;
            $toko->deskripsi = $request->deskripsi;
            $toko->pengelola = $request->pengelola;
            $toko->status = $request->status;

            // save to database
            $toko->save();
        } catch (\Throwable $th) {
            notify()->error('Update Profil Toko Gagal. ' . $th->getMessage(), 'Gagal!');
            return back();
        }

        notify()->success('Update Profil Toko berhasil.', 'Berhasil!');
        return back();
    }
}
