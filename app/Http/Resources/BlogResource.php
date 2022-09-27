<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    // public function toArray($request)
    // {
    //     return parent::toArray($request);
    // }
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'shortDetail' => $this->shortDetail,
            'detail' => $this->detail,
            'thumb' => $this->thumb,
            'status' => $this->status,
            'datePublic' => $this->datePublic,
            'categoryId' => $this->categoryId,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}