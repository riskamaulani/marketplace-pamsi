<?php

namespace App\Models;

use App\Enums\UserStatus;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    public $incrementing = false;

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    protected $attributes = [
        'email' => null,
        'nomor_hp' => null,
        'alamat' => null,
        'foto_profil' => null,
        'status' => UserStatus::PEMBELI
    ];

    protected $casts = [
        'password' => 'hashed',
        'status' => UserStatus::class
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'users', 'field' => 'id', 'length' => 15, 'prefix' => 'USR' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function toko()
    {
        return $this->hasOne(Toko::class);
    }

    public function produks()
    {
        return $this->hasManyThrough(Produk::class, Toko::class);
    }

    public function keranjang()
    {
        return $this->belongsToMany(Produk::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
