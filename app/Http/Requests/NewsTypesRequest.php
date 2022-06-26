<?php

namespace App\Http\Requests;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class NewsTypesRequest extends FormRequest
{

         
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
        ];
    }


}
