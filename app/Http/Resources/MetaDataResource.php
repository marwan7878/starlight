<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MetaDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'meta_data'=>[
                'title_social'=>$this->title_social,
                'desc_social'=>$this->description_social,
                'link'=>$this->link,
                'photo'=>$this->image_url,
                'alt'=>$this->alt
            ],
            'category'=> $this->category ? [
                'id' => $this->category->id,
                'name' => $this->category->name,
                'description' => $this->category->description
            ] : null
        ];
    }
}
