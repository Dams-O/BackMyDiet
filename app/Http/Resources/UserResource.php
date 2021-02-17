<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id_user'=> $this->id_user,
            'pseudo' => $this->pseudo,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->mail,
            'api_token' => $this->api_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'stats' => $this->stats,
        ];
    }
}
