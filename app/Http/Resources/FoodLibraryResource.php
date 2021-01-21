<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodLibraryResource extends JsonResource
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
            'id_food' => $this->id_food,
            'category' => $this->category,
            'name' => $this->name,
            'recipes' => $this->recipes,
            'meals' => $this->meals,
            'datas_user' => $this->datas
        ];
    }
}
