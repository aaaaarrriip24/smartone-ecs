<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TKonsultasiTopik extends Model
{
    
    use HasFactory;
    protected $table = 't_konsultasi_topik';
    protected $fillable = ['*'];
}
