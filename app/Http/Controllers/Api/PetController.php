<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AvatarRequest;
use App\Http\Requests\Api\PetCreateRequest;
use App\Http\Requests\Api\PetUpdateRequest;
use App\Http\Resources\PetResource;
use App\Models\Pet;
use Carbon\Carbon;
use Illuminate\Http\Response;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  PetResource::collection(auth()->user()->pets()->get());
        return $this->successResponser('واکشی اظلاعات با موفقیت انجام شد.', Response::HTTP_OK,  $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PetCreateRequest $request): \Illuminate\Http\JsonResponse
    {


        $pet =  Pet::create([
                'user_id'  => auth()->user()->id,
                'breed_id' => $request->breed_id,
                'birthdate' => Pet::storeDate($request->birthdate)
            ] + $request->all());

        $data = new PetResource($pet);
        return $this->successResponser('اطلاعات شما با موفقیت ثبت شد.', Response::HTTP_OK,  $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        $data = new PetResource($pet);
        return $this->successResponser('واکشی اظلاعات با موفقیت انجام شد.', Response::HTTP_OK,  $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Pet $pet, PetUpdateRequest $request)
    {
        $result =  $pet->update($request->all());
        if ($result) {
            $data = new PetResource($pet);
            return  $this->successResponser('بروزرسانی پت با موفقیت انجام شد.', Response::HTTP_OK, $data);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        if ($pet->delete()) {
            return $this->successResponser('پت شما با موفقیت پاک شد.', Response::HTTP_OK, null);
        };
    }


    /**
     * upload avatar for pets.
     */
    public function uploadAvatar(Pet $pet , AvatarRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $image_path = $request->file('avatar')->store('avatar', 'public');
            $pet->update([ 'avatar' => $image_path ]);
            return $this->successResponser('اپلود اواتار با موفقیت انجام شد.', Response::HTTP_OK, asset($image_path));
        }

    }
}
