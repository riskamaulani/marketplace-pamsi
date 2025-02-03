<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    // Can Input by User
    protected $fillable = [
        'user_id',
        'product_id',
        'total',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
