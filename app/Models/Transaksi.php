<?php

namespace App\Models;

use App\Enums\TransaksiStatus;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $guarded = [];

    protected $attributes = [
        'status' => TransaksiStatus::KONFIRMASI
    ];

    protected $casts = [
        'status' => TransaksiStatus::class
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'transaksis', 'field' => 'id', 'length' => 15, 'prefix' => 'TRX' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produks()
    {
        return $this->belongsToMany(Produk::class);
    }
}
