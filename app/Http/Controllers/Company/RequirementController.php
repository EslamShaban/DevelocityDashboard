<?php

namespace App\Http\Controllers\Company;

use App\Models\Requirement;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReqirementRequest;
use App\Models\Admin;
use App\Notifications\AddRequirement;
use App\Notifications\ChangStatusRequirement;

class RequirementController extends Controller
{
     public function requirements()
     {
        $requirements = Requirement::orderBy('id', 'DESC')->get();
        return view('backend.admin.requirements.index' , compact('requirements'));
     }

    public function index()
    {
        $user = auth()->user()->id;
        $requirements = Requirement::where('user_id' , $user)->orderBy('id', 'DESC')->get();
        return view('backend.company.requirements.index' , compact('requirements'));
    }


    public function create()
    {
        $user_id = auth()->user()->id;
        $tasks = Task::whereHas('users', function($q) use($user_id){
            return $q->where('user_id', $user_id);
        })->orderBy('id', 'DESC')->get();

        $admins = Admin::get();
        return view('backend.company.requirements.create' , compact('tasks' , 'admins'));
    }


    public function store(Request $request)
    {
        Requirement::create([
             'name' => $request->name,
             'price' => $request->price ,
             'task_id' => $request->task_id ,
             'user_id' => auth()->user()->id ,
             'admin_id' => $request->admin_id ,
             'status' => 'waiting'
        ]);

        $req = Requirement::latest()->first();

        $req->admin->notify(new AddRequirement($req));

        toastr()->success('requirements created sucessfully');
        return redirect()->route('requirements.index');
    }



    public function edit($id)
    {
        $requirement = Requirement::findOrfail($id);
        $user_id = auth()->user()->id;
        $tasks = Task::whereHas('users' , function($q) use ($user_id) {
                return $q->where('user_id', $user_id);
        })->get();
        return view('backend.company.requirements.edit' , compact('requirement','tasks'));

    }


    public function update(ReqirementRequest $request, $id)
    {
        $requirement = Requirement::findOrfail($id);
        $requirement->update([
            'name' => $request->name,
            'price' => $request->price ,
            'task_id' => $request->task_id ,
            'user_id' => auth()->user()->id ,
            'admin_id' => $request->admin_id

       ]);
       toastr()->success('requirements updated sucessfully');
       return redirect()->route('requirements.index');


    }


    public function destroy($id)
    {
       Requirement::destroy($id);
       toastr()->success('requirements deleted sucessfully');
       return redirect()->route('requirements.index');
    }

    public function changStatus( Request $request ,$id)
    {
        $req = Requirement::findOrfail($id);
        $req->update(['status' => $request->status]);
        $req->user->notify(new ChangStatusRequirement($req));
        return redirect()->route('admin.requirement.requirements');

    }


    public function show($id)
    {
        $requirement = Requirement::where('id' , $id)->first();
        return view('backend.admin.requirements.details' , compact('requirement'));
    }

    public function requirements_details($id)
    {
        $requirement = Requirement::where('id' , $id)->first();
        return view('backend.company.requirements.details' , compact('requirement'));
    }
}
