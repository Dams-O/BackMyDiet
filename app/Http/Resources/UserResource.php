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
            'pseudo' => $this->pseudo,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->mail,
            'api_token' => $this->api_token,
        ];
    }
}
