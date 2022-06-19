<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table='sections';
    protected $fillable=['name' ,'company_id'];

    // function get company

    public function company()
    {
        return $this->belongsTo(Company::class , 'company_id');
    }
}
