<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KProduk extends Model
{
    use SoftDeletes;
    
    use HasFactory;
    protected $table = 'm_k_produk';
    protected $fillable = ['*'];
}