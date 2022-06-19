<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use HasApiTokens , HasFactory, Notifiable;



    protected $fillable = ['name' ,'email' ,'img' ,'password' ,'company_id' ,'section_id', 'job_title', 'job_desc', 'kpis'];

    protected $appends = ['user_type'];

    // function get company
    public function company()
    {
        return $this->belongsTo(Company::class , 'company_id');
    }

    // function get section
    public function section()
    {
        return $this->belongsTo(Section::class , 'section_id');
    }

    // function get tasks
    public function tasks()
    {
        //return $this->hasMany(Task::class , 'user_id');
        return $this->belongsToMany(Task::class, 'task_users')->withPivot('rate', 'desc');;
    }


    // function get avg of rates
    public function avg_rates()
    {
        $tasks_rated = $this->tasks->where('pivot.rate', '!=',null)->count();

        if($tasks_rated)
            return $this->tasks->sum('pivot.rate') / $tasks_rated;

    }



    protected $hidden = [
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUserTypeAttribute()
    {
        return 'users';
    }



}
