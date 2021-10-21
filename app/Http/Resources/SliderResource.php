<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
            'type' => 'sliders',
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => [
                'description1' => $this->resource->description1,
                'description2' => $this->resource->description2,
                'slider_image' => $this->resource->slider_image,
                'status' => (int)$this->resource->status,
            ],
            'links' => [
                'self' => url(route('api.v1.sliders.show', $this->resource)),
            ]
        ];
    }
}
