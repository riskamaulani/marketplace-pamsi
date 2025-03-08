<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    // Can Input by User
    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'image',
        'stock',
        'status',
        'shop_id',
        'order_type',
        'ratings',
        'ratings_count',
    ];

    protected $keyType = 'string';

    // Default Value
    protected $attributes = [
        'sold' => 0,
        'ratings_count' => 0,
    ];

    // Generate Unique ID for Product
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'products', 'field' => 'id', 'length' => 10, 'prefix' => 'PRD' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function rating(): HasMany
    {
        return $this->hasMany(Rating::class)->latest();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeFilterByDate($query, $filter)
    {
        return match ($filter) {
            'daily' => $query->whereDate('created_at', today()),
            'monthly' => $query->whereMonth('created_at', now()->month),
            'yearly' => $query->whereYear('created_at', now()->year),
            default => $query,
        };
    }
}
