<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $keyType = 'string';

    // Generate Unique ID for Product
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'categories', 'field' => 'id', 'length' => 15, 'prefix' => 'CTG' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function totalProducts()
    {
        return $this->products()->count();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
