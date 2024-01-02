<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Kategori extends Model
{
    // use HasFactory;

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'kategoris', 'field' => 'id', 'length' => 15, 'prefix' => 'KTG' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function produks()
    {
        return $this->belongsToMany(Produk::class);
    }
}
