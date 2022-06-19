<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $table='complaints';
    protected $fillable=['title', 'message' , 'type', 'complaint_type','user_id', 'task_id'];

    public function users()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
