<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table='tasks';
    protected $guarded=[];

    // function get company
    public function company()
    {
         return $this->belongsTo(Company::class , 'company_id');
    }

    // function get jobs
    public function sections()
    {
        //return $this->belongsTo(Recruitment::class , 'job_id');
        return $this->belongsToMany(Section::class, 'task_sections', 'task_id', 'section_id');

    }

    // function get user
    public function users()
    {
      //return $this->belongsTo(User::class , 'user_id');
      return $this->belongsToMany(User::class, 'task_users')->withPivot('rate', 'desc');;
    }

    // function get admin
    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }

}
