<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
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
            'id_recipe' => $this->id_recipe,
            'picture' => $this->picture,
            'title' => $this->title,
            'hashtag' => $this->hashtag,
            'meal_library_name' => $this->meal_library_name,
            'meal_categories_name' => $this->meal_categories->name,
            'preparation_time' => $this->preparation_time,
            'cooking_time' => $this->cooking_time,
            'parts_number' => $this->parts_number,
        ];
    }
}
