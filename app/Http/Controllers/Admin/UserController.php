<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ImportFileRequest;
use App\Models\Company;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Exports\UserTasksRate;
use App\Imports\UsersImport;
use Excel;
class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('backend.admin.users.index' , compact('users'));
    }


    public function create()
    {
        $companies = Company::get();
        $jobs = Section::get();
        return view('backend.admin.users.create' , compact( 'companies' , 'jobs'));

    }


    public function store(UserRequest $request)
    {
        $file_name = '';

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'img' => $file_name,
            'password' => bcrypt($request->password),
            'company_id' => $request->company_id,
            'section_id' => $request->section_id ,
            'job_title' => $request->job_title ,
            'job_desc' => $request->job_desc ,
            'kpis' => $request->kpis ,
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
        ]);

        if ($request->hasFile('img')) {
            // move img
            $request->img->move(public_path('/Attachments/users/'), $file_name);
        }

        toastr()->success('User has been created successfully!');
        return redirect()->route('users.index');
    }




    public function edit($id)
    {
        $companies = Company::get();
        $sections = Section::get();
        $user = User::findOrfail($id);
        return view('backend.admin.users.edit' , compact( 'companies' , 'sections' , 'user'));
    }


    public function update(UserRequest $request, $id)
    {
        $new_file_name = '';
        $old_file_name = '';

        $user = User::findOrfail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'company_id' => $request->company_id,
            'section_id' => $request->section_id ,
            'job_title' => $request->job_title ,
            'job_desc' => $request->job_desc ,
            'kpis' => $request->kpis ,
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
        ]);

        if ($request->hasFile('img')) {
            $new_file_name = $request->file('img')->getClientOriginalName();
            $old_file_name = $user->img;
            $user->img = $new_file_name ;
        }

        if ($request->hasFile('img')) {
            // move img
            Storage::disk('users')->delete('/'.$old_file_name);
            $request->img->move(public_path('/Attachments/users/'), $new_file_name);
        }

        $user->save();

        toastr()->success('user has been updated successfully!');
        return redirect()->route('users.index');


    }


    public function destroy($id)
    {
        $old_file_name = '';

        $user = User::where('id' , $id)->first();
        $user->id = $id;

        $old_file_name = $user->img;

        if (!empty($user->name)) {

            Storage::disk('users')->delete('/'.$old_file_name);
        }
        User::destroy($id);
        toastr()->success('user has been deleted successfully!');
        return redirect()->route('users.index');
    }

    public function get_section($id)
    {
       $jobs = Section::where('company_id' , $id)->pluck('name' , 'id');
       return $jobs;
    }

    public function export($user_id)
    {
        $user = User::where('id' , $user_id)->first();
        return Excel::download(new UserTasksRate($user), 'xx.xlsx');
    }


        
    public function uploadcsv()
    {
        return view('backend.admin.users.uploadcsv');
    }

    public function importcvs(ImportFileRequest $request)
    {
            $file = $request->file('file');
            Excel::import(new UsersImport, $file);
         
            toastr()->success('user has been added successfully!');
            return redirect()->route('users.index');
    }
}
