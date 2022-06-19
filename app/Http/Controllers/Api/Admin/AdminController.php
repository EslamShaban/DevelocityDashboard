<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Requests\Api\admin\AdminLoginRequest;
use App\Http\Requests\Api\admin\AdminRegisterRequest;
use App\Http\Requests\Api\admin\AdminUpdateRequest;
use App\Http\Resources\AdminResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
     use ApiResponseTrait;

     public function index()
     {
        $admins = Admin::orderBy('id', 'DESC')->get();
        if($admins){
            return $this->apiResponse(AdminResource::collection($admins) , 200 , 'admins found');
        }else{
            return $this->apiResponse(false , 404 , 'admins not found');
        }
     }

     public function register(AdminRegisterRequest $request)
     {


        $file_name = '';

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
        }


        $admin = Admin::create([
            'admin_name' => $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
            'img'=> $file_name ,
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
        ]);

        if ($request->hasFile('img')) {
            // move img
            $request->img->move(public_path('/Attachments/admins/'), $file_name);
        }

        $token = $admin->createToken('token-name')->plainTextToken;

        $response = [
            'admin' => new AdminResource($admin) ,
            'token' => $token
        ];

        return $this->apiResponse($response , 200 , 'admin created sucessfully');

     }

     public function login(AdminLoginRequest $request)
     {

        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not match with our record.',
            ], 401);
        }else{

            $admin = Admin::where(['email' => $request->email])->first();
            $response = [
                'admin' => new AdminResource($admin) ,
                'token' => $admin->createToken('token-name')->plainTextToken
            ];

            return $this->apiResponse($response , 200 , 'admin login sucessfully');
        }

     }

     public function getAdmin($id)
     {
        $admin = Admin::where('id' , $id)->first();
        if($admin){
            return $this->apiResponse( new AdminResource($admin) , 200 , 'user find sucess');
        }else{
            return $this->apiResponse(null , 404 , 'user not found');

        }
     }

     public function update(AdminUpdateRequest $request , $id)
     {

        $new_file_name = '';
        $old_file_name = '';

        $admin = Admin::where('id' , $id)->first();

        if($admin){

            $admin->update([
                'admin_name' => $request->name,
                'email'=> $request->email,
                'password' =>bcrypt($request->password),
                'email_verified_at'=>now(),
                'remember_token'=>Str::random(10),
            ]);

            if ($request->hasFile('img')) {
                $new_file_name = $request->file('img')->getClientOriginalName();
                $old_file_name = $admin->img;
                $admin->img = $new_file_name ;
            }

            if ($request->hasFile('img')) {
                // move img
                Storage::disk('admins')->delete('/'.$old_file_name);
                $request->img->move(public_path('/Attachments/admins/'), $new_file_name);
            }

            $admin->save();

            $response = [
                'admin' => new AdminResource($admin) ,
                'token' => $admin->createToken('token-name')->plainTextToken
            ];

            return $this->apiResponse( $response , 201 , 'admin update sucessfully');

        }else{
            return $this->apiResponse(null , '404' , 'admin not found');
        }

     }

     public function destroy($id)
     {
         $old_file_name = '';

         $admin = Admin::where('id' , $id)->first();
            if ( $admin) {
                $admin->id = $id;
                $old_file_name = $admin->img;

                if (!empty($admin->admin_name)) {
                    Storage::disk('admins')->delete('/'.$old_file_name);
                    Admin::destroy($id);
                    return $this->apiResponse(true , 200 , 'admin deleted sucessfully');
                }

            }else{
                return $this->apiResponse(null , 404 , 'admin not found');
            }



     }

     public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return $this->apiResponse(true , 200 , 'admin has logout successfully');
    }





}
