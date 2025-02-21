<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Shop;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'contact',
        'address',
        'profile',
        'password',
        'forced_logout'
    ];

    protected $keyType = 'string';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Defaul Value
    protected $attributes = [
        'role' => 'pembeli',
        'forced_logout' => false
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Generate Unique ID for User
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'users', 'field' => 'id', 'length' => 15, 'prefix' => 'USR' . date('ym'), 'reset_on_prefix_change' => true]);
        });
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    // User relation to shop
    public function shop(): HasOne
    {
        return $this->hasOne(Shop::class);
    }

    public function order(): HasManyThrough
    {
        return $this->hasManyThrough(Order::class, Transaction::class)->latest();
    }
    
}
