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
            'color' => $this->color,
            'sex'   => $this->sex,
            'brithdate' => $this->brithdate,
            'is_sterilized' => $this->is_sterilized,
            'training_level' => $this->training_level,
            'vaccine' => $this->vaccine,
            'created_at' => $this->created_at,
            'breed' => [
                'parent_name' => $this->breed()->first()->parent->name,
                'name'        => $this->breed->name,
            ],
        ];
    }
}
