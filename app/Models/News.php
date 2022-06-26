<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table='news';
    protected $fillable=['title','desc','img','news_types_id','company_id'];

        
    public function company()
    {
         return $this->belongsTo(Company::class , 'company_id');
    }

        
    public function type()
    {
         return $this->belongsTo(News_Type::class , 'news_types_id');
    }
}
