<?php

namespace App\Http\Requests;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class NewsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'title' => 'required',
                'desc' => 'required',
                'img' => 'required|mimes:png,jpg,jpeg',
                'company_id' => 'nullable',
                'news_types_id' => 'required'
            ];
        }else{
                        
            return [
                'title' => 'required',
                'desc' => 'required',
                'img' => 'nullable|mimes:png,jpg,jpeg',
                'company_id' => 'nullable',
                'news_types_id' => 'required'
            ];
        }
    }


}
