<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'         => 'required',
            'message'       => 'required' ,
            'type'          => 'required',
            'task_id'       => 'sometimes|required'
        ];
    }
}
