<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeStepsResource extends JsonResource
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
            'id_recipe_steps' => $this->id_recipe_steps,
            'step_number' => $this->step_number,
            'recipe' => $this->recipe

        ];
    }
}
