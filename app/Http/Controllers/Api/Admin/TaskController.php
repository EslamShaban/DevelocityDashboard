<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Admin;
use App\Http\Resources\TaskResource;
use App\Http\Requests\Api\admin\TaskRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Api\admin\RateRequest;

class TaskController extends Controller
{
    use ApiResponseTrait;

    public function index($id=null)
    {
        $tasks = Task::when($id != null, function($q) use($id){
                $q->where('id', $id);
        })->orderBy('id', 'DESC')->get();

        if($tasks){
            return $this->apiResponse(TaskResource::collection($tasks) , 200 , 'tasks found');
        }else{
            return $this->apiResponse(false , 404 , 'tasks not found');
        }
    }
        
    
    public function store(TaskRequest $request)
    {

        $request_data = $request->except(['section_ids', 'user_ids']);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $request->img->move(public_path('/Attachments/tasks/'), $image->getClientOriginalName());
            $request_data['img'] = $image->getClientOriginalName();
        }

        $request_data['admin_id'] = auth('admin-api')->user()->id;

        $task = Task::create($request_data);

        $task->sections()->sync($request->section_ids);
        $task->users()->sync($request->user_ids); 

        if($task){
          return $this->apiResponse(new TaskResource($task) , 201 , 'task creates sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'something went wrong');
        }
    }



    public function update(TaskRequest $request, $id)
    {

        $task = Task::Where('id' , $id)->first();

        if($task){

            $request_data = $request->except(['section_ids', 'user_ids']);

            if ($request->hasFile('img')) {
                
                Storage::disk('tasks')->delete('/'.$task->img);
                $image = $request->file('img');
                $request->img->move(public_path('/Attachments/tasks/'), $image->getClientOriginalName());
                $request_data['img'] = $image->getClientOriginalName();
            }

            
            $request_data['admin_id'] = auth('admin-api')->user()->id;

            $task->update($request_data);

            $task->sections()->sync($request->section_ids);
            $task->users()->sync($request->user_ids);


            return $this->apiResponse(new TaskResource($task) , 201 , 'task update sucessfully');

        }else{
            return $this->apiResponse(null , 404 , 'task not found');
        }
    }


    public function destroy($id)
    {
        $task = Task::Where('id' , $id)->first();

        if($task){
                    
            if (!empty($task->img)) {

                Storage::disk('tasks')->delete('/'.$task->img);
            }

            Task::destroy($id);
            return $this->apiResponse(true , 201 , 'task deleted sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'task not found');
        }
    }

        
    public function rate(RateRequest $request, $id)
    {
        
        $task = Task::Where('id' , $id)->first();

        $users_task_rate = array();
        foreach($request->rate_task as $key=>$value){
            $j=0;
            foreach($value as $val){
                $users_task_rate[$j][$key] = $val;
                $j++;
            }
        }

        foreach($users_task_rate as $user_task_rate){

            $task->users()->updateExistingPivot($user_task_rate['user_id'], ['rate'=>$user_task_rate['rate'], 'desc'=>$user_task_rate['desc']]);
        }

                    
        return $this->apiResponse(true , 200 , 'task rated sucessfully');


    }
}
