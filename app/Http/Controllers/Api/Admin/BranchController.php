<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\admin\BranchRequest;
use App\Http\Resources\BranchResource;
use App\Models\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $branches = Company::orderBy('id', 'DESC')->get();

        if($branches){
            return $this->apiResponse( BranchResource::collection($branches), 200 , 'branches found sucess');
        }else{
            return $this->apiResponse($branches , 404 , 'not found');

        }
    }

    public function store(BranchRequest $request)
    {
        $branch  = Company::create([
            'name' => $request->name ,
            'lat'=> $request->lat ,
            'lng' => $request->lng ,
            'location' => $request->location ,
         ]);

         if($branch){
             return $this->apiResponse(new BranchResource($branch) , 201 , 'branch created sucessfully');
         }else{
            return $this->apiResponse(null , 404 , 'branch not found');
         }
    }

    public function update(Request $request , $id)
    {
        $branch = Company::Where('id' , $id)->first();
        if($branch){
            $branch->update([
                'name' => $request->name ,
                'lat'=> $request->lat ,
                'lng' => $request->lng ,
                'location' => $request->location ,
            ]);
            return $this->apiResponse(new BranchResource($branch) , 201 , 'branch updated sucessfully');

        }else{
            return $this->apiResponse(null , 404 , 'branch not found');
        }
    }

    public function destroy($id)
    {
        $branch = Company::Where('id' , $id)->first();
        if($branch){
            Company::destroy($id);
            return $this->apiResponse(true , 200 , 'branch delete sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'branch not found');

        }

    }
}
