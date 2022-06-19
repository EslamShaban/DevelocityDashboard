<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit_profile()
    {
        return view('backend.company.users.edit');
    }

    public function update_profile(UpdateProfileRequest $request)
    {

        $user = auth('admin-company')->user();

        $data = $request->except(['password']);
        
        if(request()->has('password') && request('password') != null){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        if ($request->hasFile('img')) {
            $file_name = $request->file('img')->getClientOriginalName();
            $user->img = $file_name ;
            Storage::disk('users')->delete('/'.$user->img);
            $request->img->move(public_path('/Attachments/users/'), $file_name);
        }

        $user->save();

        toastr()->success('profile has been updated successfully!');
        return redirect()->route('profile.edit');
    }
}
