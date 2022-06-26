<?php

namespace App\Http\Requests\Api\Admin;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class NewsRequest extends FormRequest
{

     use ApiResponseTrait;

    public function rules()
    {

        $rules = [
                'title' => 'required',
                'desc' => 'required',
                'company_id' => 'nullable|exists:companies,id',
                'news_types_id' => 'required|exists:news__types,id'
        ];

        $rules += $this->method() == 'POST' ? [ 'img' => 'required|mimes:png,jpg,jpeg' ] : ['img' => 'nullable|mimes:png,jpg,jpeg' ];

        return $rules;
    }


    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['title']) ) {
            $msg = $error['title'][0];
            $code = 423;
        } elseif ( isset($error['desc']) ) {
            $msg = $error['desc'][0];
            $code = 424;
        }elseif ( isset($error['img']) ) {
            $msg = $error['img'][0];
            $code = 425;
        }elseif ( isset($error['company_id']) ) {
            $msg = $error['company_id'][0];
            $code = 426;
        }elseif ( isset($error['news_types_id']) ) {
            $msg = $error['news_types_id'][0];
            $code = 427;
        }else {
            $msg = __('api.error');
            $code = 422;
        }


        throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
    }

}
