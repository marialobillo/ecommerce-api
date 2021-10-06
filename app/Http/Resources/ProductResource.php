<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'type' => 'products',
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => [
                'product_name' => $this->resource->product_name,
                'product_price' => $this->resource->product_price,
                'status' => $this->resource->status,
            ],
            'links' => [
                'self' => url(route('api.v1.products.show', $this->resource)),
            ]
        ];
    }
}
