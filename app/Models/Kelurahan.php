<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelurahan extends Model
{
    use SoftDeletes;
    
    use HasFactory;
    protected $table = 'indonesia_villages';
    protected $fillable = ['*'];
}
