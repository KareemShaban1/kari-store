<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    // api resource اللى بيرجع عن طريق حاجة أسمها api response على ال  customize ممكن أعمل 

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
            'product_name'=>$this->name,
            'price'=>[
                'normal'=>$this->price,
                'compare'=>$this->compare_price
            ],
            'store_id' => $this->store_id,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $this->image,
            'compare_price' => $this->compare_price,
            'quantity' => $this->quantity,
            'featured' => $this->featured,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}