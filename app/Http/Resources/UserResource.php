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
            'id' => $this->id,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'email' =>$this->email,
            'address' => $this->address,
            'password' => $this->password,
            'profile_photo' => $this->profile_photo,
            'birthday' => $this->birthday,
            'address_id' => $this->address_id,
            'remember_token' => $this->remember_token,
            'role' =>$this->role
            //'roles' => UserResource::collection($this->roles)

        ];
    }
}
