<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataIcecubeResource extends JsonResource
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
            'id_data_icecube' => $this->id_data_icecube,
            'user_pseudo' => $this->user->pseudo,
            'Calcium' => $this->Calcium,
            'Proteines' => $this->Proteines,
            'Glucides' => $this->Glucides,
            'Legumes' => $this->Legumes,
            'Lipides' => $this->Lipides,
            'Sucre' => $this->Sucre,
            'score' => $this->score,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
