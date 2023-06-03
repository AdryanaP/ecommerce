<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id' => $this->id,

            'client_id' => new ClientResource($this->client_id),
            'product_id' => new ProductResource($this->product_id),
            'seller_id' => new SellerResource($this->seller_id),

            'created_at' => $this->created_at,
        ];
    }
}
