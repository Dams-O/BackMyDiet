<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StatsResource extends JsonResource
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
            'id_stats' => $this->id_stats,
            'user_pseudo' => $this->users->pseudo,
            'xp' => $this->xp,
            'tier' => $this->tier,
        ];
    }
}
