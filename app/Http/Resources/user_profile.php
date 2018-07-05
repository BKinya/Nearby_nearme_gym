<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class user_profile extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'age' =>$this->age,
            'current_weight' =>$this->current_weight,
            'target_weight' => $this->target_weight

        ];
    }
}
