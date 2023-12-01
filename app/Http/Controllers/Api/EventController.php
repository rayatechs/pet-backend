<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EventCreateRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function get()
    {
        $data =  EventResource::collection(Event::all());
            return $this->successResponser('واکشی اطلاعات با موفقیت انجام شد.', Response::HTTP_OK,  $data);
    }


    public function create(EventCreateRequest $request)
    {
       $event = new EventResource( Event::create($request->all()));
        return $this->successResponser('درج اطلاعات با موفقیت انجام شد.', Response::HTTP_OK,  $event);
    }
}
