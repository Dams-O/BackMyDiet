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
            'user_pseudo' => $this->users->pseudo,
            'calcium' => $this->calcium,
            'prot' => $this->prot,
            'GL' => $this->GL,
            'FVSM' => $this->FVSM,
            'MG' => $this->MG,
            'sucre' => $this->sucre,
            'score' => $this->score,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
