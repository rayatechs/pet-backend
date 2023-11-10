<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BreedResource;
use App\Models\Breed;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BreedController extends Controller
{
    use ApiResponser;
    public function all(): \Illuminate\Http\JsonResponse
    {
        $data = BreedResource::collection(Breed::getParentWithchildren());
        return $this->successResponser('بازشگت اظلاعت بات موفقیت انجام شد' , Response::HTTP_OK, $data);
    }

}
