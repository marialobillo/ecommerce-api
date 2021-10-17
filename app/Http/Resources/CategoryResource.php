<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'type' => 'categories', 
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => [
                'category_name' => $this->resource->category_name,
            ],
            'links' => [
                'self' => url(route('api.v1.categories.show', $this->resource)),
            ]
        ];
    }


    public function toResponse($request)
    {
        return parent::toResponse($request)->withHeaders([
            'Location' => route('api.v1.categories.show', $this->resource)
        ]);
    }
}
