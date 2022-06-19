<?php

namespace App\Http\Requests\Api\user;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class RegisterUserRequest extends FormRequest
{

     use ApiResponseTrait;

    public function rules()
    {
        return [
            'name' => 'required' ,
            'email' => 'required|email|unique:users,email' ,
            'img' => 'nullable|mimes:png,jpg,jpeg' ,
            'password' => 'required' ,
            'company_id' => 'required|exists:companies,id' ,
            'section_id' => 'required|exists:sections,id' ,
            'job_title' => 'required' ,
            'job_desc' => 'required' ,
            'kpis' => 'required' ,
        ];
    }


    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['name']) ) {
            $msg = $error['name'][0];
            $code = 422;
        } elseif ( isset($error['email']) ) {
            $msg = $error['email'][0];
            $code = 422;
        }elseif ( isset($error['password']) ) {
            $msg = $error['password'][0];
            $code = 422;
        }elseif ( isset($error['img']) ) {
            $msg = $error['img'][0];
            $code = 422;
        }elseif ( isset($error['company_id']) ) {
            $msg = $error['company_id'][0];
            $code = 422;
        }elseif ( isset($error['section_id']) ) {
            $msg = $error['section_id'][0];
            $code = 422;
        }elseif ( isset($error['job_title']) ) {
            $msg = $error['job_title'][0];
            $code = 422;
        }elseif ( isset($error['job_desc']) ) {
            $msg = $error['job_desc'][0];
            $code = 422;
        }elseif ( isset($error['kpis']) ) {
            $msg = $error['kpis'][0];
            $code = 422;
        }else {
            $msg = __('api.error');
            $code = 422;
        }


        throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
    }

}
