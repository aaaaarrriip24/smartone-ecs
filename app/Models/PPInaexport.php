<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PPInaexport extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'p_peserta_inaexport';
    protected $fillable = ['*'];
}
