<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Requests\Api\user\LoginUserRequest;
use App\Http\Requests\Api\user\RegisterUserRequest;
use App\Http\Requests\Api\user\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
      use ApiResponseTrait;

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        if($users){
             return $this->apiResponse(UserResource::collection($users) , 200 , 'users found');
        }else{
            return $this->apiResponse(null , 404 , 'users not found');
        }
    }
    public function register(RegisterUserRequest $request)
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

        if($user){
            $token = $user->createToken('token-name')->plainTextToken;

            $response = [
            'user' => new UserResource($user),
            'token' => $token
            ];

            return $this->apiResponse($response , 200 , 'user created sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'user not found');
        }





    }

    public function login(LoginUserRequest $request)
    {

        if(!auth('admin-company')->attempt($request->only(['email', 'password']))){
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not match with our record.',
            ], 401);
        }else{

            $user = User::where(['email' => $request->email])->first();
            $response = [
                'user' => new UserResource($user) ,
                'token' => $user->createToken('token-name')->plainTextToken
            ];

            return $this->apiResponse($response , 200 , 'user login sucessfully');
        }

    }

    public function getUser($id)
    {
       $user = User::Where('id' , $id)->first();

       if($user){
          return $this->apiResponse( new UserResource($user) , 200 , 'user find sucess');
       }else{
        return $this->apiResponse(null , 404 , 'not found');
       }
    }

    public function update(UpdateUserRequest $request , $id)
    {
        $user = User::where('id' , $id)->first();
        if($user){
            $new_file_name = '';
            $old_file_name = '';

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
             $response =[
                 'user' => new UserResource($user) ,
                 'token' => $user->createToken('token-name')->plainTextToken
             ];

             return $this->apiResponse($response , 200 , 'user update sucessfully');


        }else{
            return $this->apiResponse(null , 404 , 'not found');
        }
    }

    public function destroy($id)
    {
        $old_file_name = '';

        $user = User::where('id' , $id)->first();
        if($user){
            $user->id = $id;

            $old_file_name = $user->img;

            if (!empty($user->name)) {

                Storage::disk('users')->delete('/'.$old_file_name);
            }
            User::destroy($id);

            return $this->apiResponse(true , 200 , 'user deleted sucessfully');

        }else{
            return $this->apiResponse(false , 404 , 'user not found');
        }


    }
}
