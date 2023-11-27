<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AlarmCreateRequest;
use App\Http\Requests\Api\AlarmUpdateRequest;
use App\Http\Resources\AlarmResource;
use App\Models\Alarm;
use Illuminate\Http\Response;

class AlarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AlarmResource::collection(Alarm::getUserAlarms());
        return $this->successResponser('بازشگت اظلاعت بات موفقیت انجام شد', Response::HTTP_OK, $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlarmCreateRequest $request)
    {
        $data = Alarm::create([
            'user_id' => auth()->user()->id,
            'due'     => Alarm::convertDueDateToGregorian($request->due),
        ] + $request->all());

        return $this->successResponser('درج اظلاعت بات موفقیت انجام شد', Response::HTTP_OK, $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alarm $alarm)
    {
        $data = new AlarmResource($alarm);
        return $this->successResponser('بازشگت اظلاعت بات موفقیت انجام شد', Response::HTTP_OK, $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlarmUpdateRequest $request,  Alarm $alarm)
    {
        try {
            $alarm->update($request->all());
            $data = new AlarmResource($alarm);
            return $this->successResponser('بروزرسانی اظلاعت بات موفقیت انجام شد', Response::HTTP_OK, $data);
        } catch (\Exception $e) {
            return  $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alarm $alarm)
    {
        try {
            $alarm->delete();

            return $this->successResponser('حذف اظلاعت بات موفقیت انجام شد', Response::HTTP_OK, null);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
