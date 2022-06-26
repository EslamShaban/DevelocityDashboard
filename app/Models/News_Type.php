<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News_Type extends Model
{
    use HasFactory;

    protected $table='news__types';
    protected $fillable=['title'];
}
