<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'  => $this->name,
            'sex'   => $this->sex,
            'brithdate' => $this->brithdate,
            'created_at' => $this->created_at,
            'breed' => [
                'parent_name' => $this->breed()->first()->parent->name,
                'name'        => $this->breed->name,
            ],
        ];
    }
}
