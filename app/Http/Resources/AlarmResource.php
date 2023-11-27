<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlarmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'   => $this->id,
            'event' => $this->event->name,
            'user'  => new UserResource($this->user),
            'name'  => $this->name,
            'due'   => $this->due,
            'created_at' => $this->created_at
        ];
    }
}
