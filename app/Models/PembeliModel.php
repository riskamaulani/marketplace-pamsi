<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembeliModel extends Model
{
    use HasFactory;
    protected $table = "pembeli";
    protected $guarded = [];
    public $incrementing = false;
}
