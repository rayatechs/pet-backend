<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AlarmCreateRequest;
use App\Http\Requests\Api\AlarmUpdateRequest;
use App\Http\Resources\AlarmResource;
use App\Models\Alarm;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlarmController extends Controller
{
    public function all()
    {
        $data = AlarmResource::collection(Alarm::getUserAlarms());
        return $this->successResponser('بازشگت اظلاعت بات موفقیت انجام شد' , Response::HTTP_OK, $data);
    }

    public function show(Alarm $alarm)
    {
        $data = new AlarmResource($alarm);
           return $this->successResponser('بازشگت اظلاعت بات موفقیت انجام شد' , Response::HTTP_OK, $data);
    }

    public function create(AlarmCreateRequest $request)
    {
        $data = Alarm::create([
            'user_id' => auth()->user()->id,
        ] + $request->all() );

        return $this->successResponser('درج اظلاعت بات موفقیت انجام شد' , Response::HTTP_OK, $data);

    }

    public function update(AlarmUpdateRequest $request,  Alarm $alarm )
    {
        try {
            $alarm->update($request->all());
            $data = new AlarmResource($alarm);
            return $this->successResponser('بروزرسانی اظلاعت بات موفقیت انجام شد' , Response::HTTP_OK,$data);
        } catch (\Exception $e) {
            return  $e->getMessage();
        }

    }

    public function delete(Alarm $alarm)
    {
        try {
            $alarm->delete();

            return $this->successResponser('حذف اظلاعت بات موفقیت انجام شد' , Response::HTTP_OK, null);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
