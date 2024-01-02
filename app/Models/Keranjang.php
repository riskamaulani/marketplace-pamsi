<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Keranjang extends Model
{
    // use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'jumlah' => 1,
    ];
}
