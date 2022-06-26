<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Company;
use App\Models\Section;
use App\Models\Task;
use App\Models\User;
use App\Notifications\AddTask;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImportFileRequest;
use Illuminate\Http\Request;
use App\Imports\TasksImport;
use Illuminate\Support\Facades\Notification;
use Excel;
class TaskController extends Controller
{

    public function index(Request $request)
    {
        //$tasks = Task::orderBy('id', 'DESC')->get();

        $tasks = Task::when($request->userId, function($q) use ($request){
            return $q->whereHas('users', function($q)use ($request){
                return $q->where('user_id', $request->userId);
            });

        })->orderBy('id', 'DESC')->get();

        return view('backend.admin.tasks.index' , compact('tasks'));
    }

    public function create()
    {
        $companies = Company::get();
        $sections = Section::get();
        $users = User::get();

        return view('backend.admin.tasks.create' , compact('companies' , 'sections' , 'users'));


    }


    public function store(TaskRequest $request)
    {

        $file_name = '';

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
        }

        $task = Task::create([
            'title'=>$request->title,
            'company_id' => $request->company_id ,
            'desc' => $request->desc ,
            'img' => $file_name,
            'status' => $request->status ,
            'start_date' => $request->start_date ,
            'end_date' => $request->end_date ,
            'status' => 'waiting' ,
            'admin_id' => auth('admin')->user()->id 
        ]);

        $task->sections()->sync($request->section_ids);
        $task->users()->sync($request->user_ids);
        $task = Task::latest()->first();

        // $task->users->notify(new AddTask($task));

         Notification::send($task->users, new AddTask($task));


        toastr()->success('Task created sucessfully');

        return $request->userId 
                ? 
                    redirect()->route('tasks.index', ['userId'=>$request->userId])
                :
                    redirect()->route('tasks.index');
    }



    public function edit($id)
    {
        $task = Task::findOrfail($id);
        $companies = Company::get();
        $sections = Section::get();
        $users = User::whereIn('section_id', $task->sections->pluck('id'))->get();
        return view('backend.admin.tasks.edit' , compact('companies' , 'sections' , 'users' , 'task'));
    }


    public function update(TaskRequest $request, $id)
    {

        $new_file_name = '';
        $old_file_name = '';

        $task = Task::findOrfail($id);
        $task->update([
            'title'=>$request->title,
            'company_id' => $request->company_id ,
            //'job_id' => $request->job_id ,
            //'user_id' => $request->user_id ,
            'desc' => $request->desc ,
            'img' => $request->img ,
            'status' => $request->status ,
            'start_date' => $request->start_date ,
            'end_date' => $request->end_date ,
            'status' => $request->status??'waiting',
            'admin_id' => auth('admin')->user()->id ,


        ]);

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $task->img;
            $task->img = $new_file_name ;
        }

        if ($request->hasFile('img')) {
            // move img
            Storage::disk('tasks')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/tasks/'), $new_file_name);
        }

        $task->save();

        $task->sections()->sync($request->section_ids);
        $task->users()->sync($request->user_ids);

        toastr()->success('Task updated sucessfully');
        return redirect()->route('tasks.index');
    }


    public function destroy($id)
    {

        $task = Task::where('id' , $id)->first();

        if (!empty($task->img)) {

            Storage::disk('tasks')->delete('/'.$task->img);
        }
        Task::destroy($id);
        toastr()->success('Task has been deleted successfully!');
        return redirect()->route('tasks.index');
    }

    public function rate_task(Request $request, Task $task)
    {
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

        toastr()->success('Task has been rated successfully!');
        return redirect()->back();

    }

    public function get_sections($id)
    {
       $sections = Section::where('company_id' , $id)->pluck('name' , 'id');
       return $sections;
    }

    public function get_users_by_section_ids($section_ids)
    {
        $section_ids = explode(',' , $section_ids);
        $users = User::whereIn('section_id' , $section_ids)->pluck('name' , 'id');
        return $users;
    }

    public function get_user_tasks($id)
    {
        $users_tasks = User::where('id' , $id)->first()->tasks->pluck('title','id');
        return $users_tasks;
    }

    public function task_details($id)
    {
        $task = Task::where('id' , $id)->first();
        return view('backend.admin.tasks.details' , compact('task'));

    }

    public function check_task_users(Task $task, $user_id)
    {
        return in_array($user_id, $task->users->pluck('id')->toArray()) ?? false;
    }
    public function MarkAsRead_all (Request $request)
    {

       if(auth('admin')->check()){
            $userUnreadNotification= auth('admin')->user()->unreadNotifications;

            if($userUnreadNotification) {
                $userUnreadNotification->markAsRead();
                return back();
            }

       }else{
        $userUnreadNotification= auth('admin-company')->user()->unreadNotifications;

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }
       }



    }

        public function uploadcsv()
    {
        return view('backend.admin.tasks.uploadcsv');
    }

    public function importcvs(ImportFileRequest $request)
    {
            $file = $request->file('file');
            Excel::import(new TasksImport, $file);
            /*
            $filename = $file->getClientOriginalName();
            $tempPath = $file->getRealPath();

            $location = 'uploads';
            // Upload file
            $file->move($location, $filename);

            $filepath = public_path($location . "/" . $filename);
            // Reading file
            $file = fopen($filepath, "r");
            $tasks = array();
            $i = 0;
            $arr = ['title','company', 'job', 'user_email', 'admin_emaiul', 'desc', 'start_date','end_date'];
            //Read the contents of the uploaded file
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                for ($c = 0; $c < count($filedata); $c++) {
                    $tasks[$i][$arr[$c]] = $filedata[$c];
                }
                $i++;
            }
            fclose($file);
            $j = 0;
            foreach ($tasks as $task) {
                $j++;
                try {
                    DB::beginTransaction();
                    Task::create([
                    'title' => $task['title'],
                    'company_id'=>Company::where('name', $task['company'])->pluck('id')[0],
                    'job_id'=>Recruitment::where('name', $task['job'])->pluck('id')[0],
                    'user_id'=>User::where('email', $task['user_email'])->pluck('id')[0],
                    'admin_id'=>Admin::where('email', $task['admin_emaiul'])->pluck('id')[0],
                    'desc'=>$task['desc'],
                    'start_date' => $task['start_date'],
                    'end_date' => $task['end_date'],
                    'status' => 'waiting' ,
                    ]);
                    DB::commit();
                } catch (\Exception $e) {
                    //throw $th;
                    DB::rollBack();
                }

            }
*/
            toastr()->success('tasks has been added successfully!');
            return redirect()->route('tasks.index');

    }
}
