<?php

namespace App\Http\Requests\Api\admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class RateRequest extends FormRequest
{

     use ApiResponseTrait;

    public function rules()
    {
        return [
            /*
            'rate_task' => 'required|array|min:3',
            'rate_task[user_id]' => 'required',
            'rate_task.rate' => 'required',
            'rate_task.desc' => 'required',*/

        ];
    }


    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();
/*
        if ( isset($error['rate_task.*.user_id']) ) {
            $msg = $error['rate_task.*.user_id'][0];
            $code = 422;
        } elseif ( isset($error['rate_task.*.desc']) ) {
            $msg = $error['rate_task.*.desc'][0];
            $code = 422;
        }elseif ( isset($error['rate_task.*.rate']) ) {
            $msg = $error['rate_task.*.rate'][0];
            $code = 422;
        }else {
            $msg = __('api.error');
            $code = 422;
        }
*/

        throw new HttpResponseException($this->apiResponse( null , '555' , $error) );
    }

}
