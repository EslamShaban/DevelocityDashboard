<?php

namespace App\Http\Requests\Api\admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class RequirementRequest extends FormRequest
{

     use ApiResponseTrait;

    public function rules()
    {
        return [
            'status' => 'required|in:waiting,rejected,approve'
        ];
    }


    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['status']) ) {
            $msg = $error['status'][0];
            $code = 422;
        }else {
            $msg = __('api.error');
            $code = 422;
        }


        throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
    }

}
