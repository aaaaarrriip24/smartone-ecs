<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSubKategoriPerusahaan extends Model
{
    use HasFactory;
    protected $table = 't_sub_kategori_perusahaan';
    protected $fillable = ['*'];
}
