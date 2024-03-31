<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PPInquiry extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'p_penerima_inquiry';
    protected $fillable = ['*'];
}
