<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Rate;
use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Http\Request;

class RateController extends Controller
{

    public function index()
    {
        $rates = Rate::orderBy('id', 'DESC')->get();
        return view('backend.admin.rates.index' , compact('rates'));
    }


    public function create()
    {
        $companies = Company::get();
        $jobs = Recruitment::get();
        $users = User::get();
        return view('backend.admin.rates.create' , compact('companies' , 'jobs' , 'users'));

    }


    public function store(Request $request)
    {
        Rate::create([
            'company_id' => $request->company_id ,
            'job_id' => $request->job_id ,
            'user_id' => $request->user_id ,
            'task_id' => $request->task_id ,
            'desc' => $request->desc ,
            'rate'=> $request->rate ,
            'admin_id' => auth('admin')->user()->id ,

        ]);
        toastr()->success('Rate created sucessfully');
        return $request->is_task_rate ? redirect()->route('tasks.index') : redirect()->route('rates.index');
    }





    public function edit($id)
    {
        $companies = Company::get();
        $jobs = Recruitment::get();
        $users = User::get();
        $rate = Rate::findOrfail($id);
        return view('backend.admin.rates.edit' , compact('companies' , 'jobs' , 'users' , 'rate'));
    }


    public function update(Request $request, $id)
    {
        $rate = Rate::findOrfail($id);
        $rate->update([
            'company_id' => $request->company_id ,
            'job_id' => $request->job_id ,
            'user_id' => $request->user_id ,
            'task_id' => $request->task_id ,
            'desc' => $request->desc ,
            'rate'=> $request->rate ,
            'admin_id' => auth('admin')->user()->id ,

        ]);
        toastr()->success('Rate updated sucessfully');
        return $request->is_task_rate ? redirect()->route('tasks.index') : redirect()->route('rates.index');
    }


    public function destroy($id)
    {
        Rate::destroy($id);
        toastr()->success('Rate delated sucessfully');
        return redirect()->route('rates.index');
    }
}
