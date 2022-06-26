<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Requirement;
use App\Models\News;

class DashboarController extends Controller
{
    public function index()
    {
         if(auth('admin-company')->check()){

            $user_id = auth('admin-company')->user()->id;


            $latest_new = News::where('company_id', auth('admin-company')->user()->company_id)->latest()->first();

            $tasks = Task::whereHas('users', function($q) use ($user_id){
                return $q->where('user_id', $user_id);
            })->count();

            $task_waiting = Task::where('status' , '=' , 'waiting')->whereHas('users', function($q) use ($user_id){
                return $q->where('user_id', $user_id);
            })->count();

            $tasks_complete = Task::where('status' , '=' , 'complete')->whereHas('users', function($q) use ($user_id){
                return $q->where('user_id', $user_id);
            })->count();


            $requirement_waiting = Requirement::where('user_id' , $user_id)->where('status' , '=' , 'waiting')->count();
            $requirement_rejected = Requirement::where('user_id' , $user_id)->where('status' , '=' , 'rejected')->count();
            $requirements_approve = Requirement::where('user_id' , $user_id)->where('status' , '=' , 'approve')->count();




           return view('backend.dashboard' , compact('latest_new','tasks' , 'task_waiting' , 'tasks_complete' ,
              'requirement_waiting' , 'requirement_rejected'  , 'requirements_approve'

           ));


            return view('backend.dashboard' );
         }else{
             $tasks = Task::count();
             $task_waiting = Task::where('status' , '=' , 'waiting')->count();
             $tasks_complete = Task::where('status' , '=' , 'complete')->count();

             $requirement_waiting = Requirement::where('status' , '=' , 'waiting')->count();
             $requirement_rejected = Requirement::where('status' , '=' , 'rejected')->count();
             $requirements_approve = Requirement::where('status' , '=' , 'approve')->count();


            return view('backend.dashboard' , compact('tasks' , 'task_waiting' , 'tasks_complete' ,

              'requirement_waiting' , 'requirement_rejected'  , 'requirements_approve'

           ));
         }


    }


}
