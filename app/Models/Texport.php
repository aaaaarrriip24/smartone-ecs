<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Texport extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 't_p_export';
    protected $fillable = ['*'];
}
