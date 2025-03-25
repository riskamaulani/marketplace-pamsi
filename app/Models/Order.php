<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    // Can Input by User
    protected $fillable = [
        'total',
        'total_product',
        'status',
        'note',
        'shipping',
        'shipping_fee',
        'products_quantity',
        'products',
        'shop_id',
        'transaction_id',
        'rating'
    ];

    protected $keyType = 'string';

    // Default Value
    protected $attributes = [
        'status' => 'confirm',
        'rating' => false
    ];

    // Format on Return
    protected $casts = [
        'products' => 'array',
    ];

    // Generate Unique ID for Shop
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'orders', 'field' => 'id', 'length' => 10, 'prefix' => 'ODR' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
    

    public function rating(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
    
}
