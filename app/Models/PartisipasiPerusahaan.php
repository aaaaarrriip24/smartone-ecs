<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartisipasiPerusahaan extends Model
{
    use HasFactory;
    protected $table = 't_partisipasi_perusahaan';
    protected $fillable = ['*'];
}
