<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class DraftModel extends Model
{
    use HasFactory;
    protected $table = 'm_draft';
    protected $fillable = ['*'];
}
