<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'desc'      => $this->desc,
            'company'   => $this->company->name ?? 'general',
            'type'      => $this->type->title,
            'img'       => url('/Attachments/news/' . $this->img)
        ];
    }
}
