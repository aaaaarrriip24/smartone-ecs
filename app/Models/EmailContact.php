<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailContact extends Model
{
    use SoftDeletes;
    
    use HasFactory;
    protected $table = 't_email_contact';
    protected $fillable = ['*'];
}
