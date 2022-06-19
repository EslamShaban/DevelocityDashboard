<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Requests\Api\admin\SectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Company;
use App\Models\Section;

class SectionController extends Controller
{
     use ApiResponseTrait;
    public function index()
    {
        $sections = Section::orderBy('id', 'DESC')->get();

        if ($sections) {
            return $this->apiResponse(SectionResource::collection($sections) , 200 , 'sections found sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'sections not found');
        }
    }


    public function store(SectionRequest $request)
    {

        $section = Section::create($request->all(['company_id'=>2]));

        if($section){
            
          return $this->apiResponse(new SectionResource($section) , 201 , 'section creates sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'section not found');
        }
    }



    public function update(SectionRequest $request, $id)
    {
        $section = Section::Where('id' , $id)->first();

        if($section){
            $section->update($request->all());
            return $this->apiResponse(new SectionResource($section) , 201 , 'section update sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'section not found');
        }
    }


    public function destroy($id)
    {
        $section = Section::Where('id' , $id)->first();

        if($section){
              Section::destroy($id);
            return $this->apiResponse(true , 201 , 'section deleted sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'section not found');
        }
    }
}
