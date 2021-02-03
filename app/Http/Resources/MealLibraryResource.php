<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealLibraryResource extends JsonResource
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
            'id_meal' => $this->id_meal,
            'name' => $this->name,
            'meal_category' => $this->meal_category,
            'foods' => $this->foods,
        ];
    }
}
