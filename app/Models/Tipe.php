<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipe extends Model
{
    use SoftDeletes;
    
    use HasFactory;
    protected $table = 'm_tipe_perusahaan';
    protected $fillable = ['*'];
}