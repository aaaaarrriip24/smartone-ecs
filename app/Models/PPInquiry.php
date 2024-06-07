<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPInquiry extends Model
{
    use HasFactory;
    protected $table = 'p_penerima_inquiry';
    protected $fillable = ['*'];
}
