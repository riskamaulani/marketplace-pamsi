<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shop extends Model
{
    use HasFactory;

    // Can Input by User
    protected $fillable = [
        'name',
        'description',
        'address',
        'manager',
        'open_schedule',
        'foto',
        'user_id',
        'verify'
    ];

    protected $keyType = 'string';

    // Default Value
    protected $attributes = [
        'verify' => false
    ];

    // Format on Return
    protected $casts = [
        'open_schedule' => 'array',
        'manager' => 'array',
    ];

    // Generate Unique ID for Shop
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'shops', 'field' => 'id', 'length' => 15, 'prefix' => 'SHP' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
