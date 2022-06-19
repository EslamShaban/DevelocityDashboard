<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => 'required|unique:users,email,' . auth('admin-company')->user()->id,
            'img' => 'nullable|mimes:png,jpg,jpeg' ,
            'password' => 'nullable' 
        ];


    }

}
