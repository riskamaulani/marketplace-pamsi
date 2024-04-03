<?php

namespace App\Models;

use App\Enums\ProdukStatus;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $guarded = [];

    protected $attributes = [
        'nama' => null,
        'harga' => null,
        'deskripsi' => null,
        'gambar' => null,
        'terjual' => 0,
        'status' => ProdukStatus::HABIS
    ];

    protected $casts = [
        'status' => ProdukStatus::class
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'produks', 'field' => 'id', 'length' => 15, 'prefix' => 'PRD' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }

    public function kategoris()
    {
        

        return $this->belongsTo(Kategori::class);
    }
}
