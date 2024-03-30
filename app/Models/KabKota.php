<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KabKota extends Model
{
    use SoftDeletes;
    
    use HasFactory;
    protected $table = 'indonesia_cities';
    protected $fillable = ['*'];
}
