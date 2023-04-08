<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'guard_name' => $this->guard_name,
            'readonly' => $this->readonly,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'permissions' => PermissionResource::collection($this->whenLoaded('permissions'))
        ];
    }
}
