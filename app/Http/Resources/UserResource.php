<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name ,
            'email' => $this->email ,
            'img' => url('/Attachments/users/'.$this->img) ,

            //'company_id' => $this->company_id ,
            'company' =>new DefultResource($this->company),

            //'section_id' => $this->section_id ,
            'section' => new DefultResource($this->section) ,
            'job_title' => $this->job_title,
             'job_desc' => $this->job_desc,
             'kpis'  => $this->kpis,
            'user_type' => $this->user_type
        ];
    }
}
