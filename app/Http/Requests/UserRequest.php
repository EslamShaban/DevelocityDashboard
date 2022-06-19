<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if($this->method() == 'POST'){
            return [
                'name' => 'required' ,
                'email' => 'required|unique:users,email' ,
                'img' => 'nullable|mimes:png,jpg,jpeg' ,
                'password' => 'required' ,
                'company_id' => 'required' ,
                'section_id' => 'required' ,
                'job_title' => 'required' ,
                'job_desc' => 'required' ,
                'kpis'      => 'required'
            ];
        } else{
            return [
                'name' => 'required' ,
                'email' => 'required' ,
                'img' => 'nullable|mimes:png,jpg,jpeg' ,
                'password' => 'nullable' ,
                'company_id' => 'required' ,
                'section_id' => 'required' ,
                'job_title' => 'required' ,
                'job_desc' => 'required' ,
                'kpis'      => 'required'

            ];
        }

    }

}
