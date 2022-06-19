<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $table='requirements';
    protected $fillable=['name' ,'price' ,'task_id' ,'user_id' ,'admin_id' , 'status'];

     // function get tasks
     public function task()
     {
         return $this->belongsTo(Task::class , 'task_id');
     }

    // function get user
    public function user()
    {
      return $this->belongsTo(User::class , 'user_id');
    }

    // function
    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }
}
