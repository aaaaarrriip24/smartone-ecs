<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topik extends Model
{
    use SoftDeletes;
    
    use HasFactory;
    protected $table = 'm_topik';
    protected $fillable = ['*'];
}
