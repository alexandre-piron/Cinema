<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_user' => $this->id_user,
            'id_food' => $this->id_movie,
            'id_seat' => $this->The_date,
            'id_broadcast' => $this->id_broadcast,
        ];
    }
}