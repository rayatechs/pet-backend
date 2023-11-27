<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Morilog\Jalali\CalendarUtils;
use Morilog\Jalali\Jalalian;

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
            'due'   => Jalalian::fromDateTime($this->due)->format('Y-m-d H:i:s'),
            'created_at' => $this->created_at
        ];
    }
}
