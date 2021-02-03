<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataUserResource extends JsonResource
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
            'id_data_user' => $this->id_data_user,
            'id_user' => $this->user->id_user,
            //'meal_categories_name' => $this->meal_categories->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'foods' => $this->foods
        ];
    }
}
