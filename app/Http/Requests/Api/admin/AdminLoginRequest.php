<?php

namespace App\Http\Requests\Api\admin;


use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;

class AdminLoginRequest extends FormRequest
{
       use ApiResponseTrait;
    public function rules()
    {
        return [
            'email'      => ['required', 'email', 'exists:admins,email'],
            'password'   => ['required'],
        ];
    }



    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['email']) ) {
            $msg = $error['email'][0];
            $code = 403;
        } elseif ( isset($error['password']) ) {
            $msg = $error['password'][0];
            $code = 402;
        } else {
            $msg = __('api.error');
            $code = 401;
        }


        throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
    }
}
