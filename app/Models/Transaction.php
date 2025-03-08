<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Can Input by User
    protected $fillable = [
        'status',
        'bill',
        'total',
        'address',
        'payment',
        'user_id',
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    // Default Value
    protected $attributes = [
        'status' => "confirm"
    ];

    // Generate Unique ID for Transaction
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'transactions', 'field' => 'id', 'length' => 10, 'prefix' => 'TRX' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'transaction_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
