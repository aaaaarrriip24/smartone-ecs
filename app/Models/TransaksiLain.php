<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiLain extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 't_lain';
    protected $fillable = ['*'];
}
