<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MSubKategori extends Model
{
    use SoftDeletes;
    
    use HasFactory;
    protected $table = 'm_sub_kategori';
    protected $fillable = ['*'];
}
