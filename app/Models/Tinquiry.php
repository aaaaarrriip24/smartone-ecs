<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tinquiry extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 't_profile_inquiry';
    protected $fillable = ['*'];
}
