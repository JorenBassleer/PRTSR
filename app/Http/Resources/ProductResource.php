<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Gender;
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'details' => $this->details,
            'storage' => $this->storage,
            'type' => new TypeCollection($this->types),
            'material' => new MaterialCollection($this->materials),
            'gender' => new GenderResource($this->gender),
            'links' => [
                'self' => route('products.show', ['product' => $this->id]),
            ],
        ];
    }
}
