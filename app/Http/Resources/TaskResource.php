<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'company'       => $this->company->name,
            'admin'         => $this->admin->admin_name,
            'sections'      => SectionResource::collection($this->sections),
            'users'         => UserResource::collection($this->users),
            'desc'          => $this->desc,
            'img'           => url('/Attachments/tasks/' . $this->img),
            'status'        => $this->status,
            'start_date'    => $this->start_date,
            'end_date'      => $this->end_date
            
        ];
    }
}
