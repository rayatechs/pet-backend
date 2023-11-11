<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PetCreateRequest;
use App\Http\Requests\Api\PetUpdateRequest;
use App\Http\Resources\PetResource;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetController extends Controller
{

    public function all(): \Illuminate\Http\JsonResponse
    {
        $data =  PetResource::collection(auth()->user()->pets()->get());
        return $this->successResponser('واکشی اظلاعات با موفقیت انجام شد.', Response::HTTP_OK,  $data);
    }

    public function show(Pet $pet)
    {
        $data = new PetResource($pet);
        return $this->successResponser('واکشی اظلاعات با موفقیت انجام شد.', Response::HTTP_OK,  $data);
    }

    public function create(PetCreateRequest $request): \Illuminate\Http\JsonResponse
    {
        $pet =  Pet::create([
            'user_id'  => auth()->user()->id,
            'breed_id' => $request->breed_id,
        ] + $request->all());

        $data = new PetResource($pet);
        return $this->successResponser('اطلاعات شما با موفقیت ثبت شد.', Response::HTTP_OK,  $data);
    }


    public function update(Pet $pet, PetUpdateRequest $request)
    {
        $result =  $pet->update($request->all());
        if ($result) {
            $data = new PetResource($pet);
            return  $this->successResponser('بروزرسانی پت با موفقیت انجام شد.', Response::HTTP_OK, $data);
        }
    }


    public function delete(Pet $pet)
    {
        if ($pet->delete()) {
            return $this->successResponser('پت شما با موفقیت پاک شد.', Response::HTTP_OK, null);
        };
    }
}
