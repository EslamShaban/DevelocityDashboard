<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'     =>'required',
            'company_id' => 'required' ,
            'section_ids' => 'required|array' ,
            'user_ids' => 'required|array' ,
            'desc' => 'required' ,
            'img' => 'nullable' ,
            'start_date' => 'required' ,
            'end_date' => 'required' ,
            'status' => 'nullable' ,
        ];
    }
}
