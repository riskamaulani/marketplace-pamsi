<?php

namespace App\Models;

use App\Enums\TokoStatus;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Toko extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $guarded = [];

    protected $attributes = [
        'pengelola' => '[]',
        'buka' => '[0, 0, 0, 0, 0, 0, 0]',
        'foto' => null,
        'deskripsi' => null,
        'status' => TokoStatus::BUKA
    ];

    protected $casts = [
        'buka' => 'array',
        'status' => TokoStatus::class
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'tokos', 'field' => 'id', 'length' => 15, 'prefix' => 'TKO' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}