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
            'meal_category' => $this->meal->meal_category,
            'preparation_time' => $this->preparation_time,
            'cooking_time' => $this->cooking_time,
            'parts_number' => $this->parts_number,
            'meal' => $this->meal,
        ];
    }
}
