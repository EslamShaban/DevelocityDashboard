<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'admin_name' => $this->admin_name ,
            'email' => $this->email ,
            'img' => url('/Attachments/admins/' . $this->img) ,
            'user_type' => $this->user_type
        ];
    }
}
