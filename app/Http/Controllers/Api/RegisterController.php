<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class RegisterController extends Controller
{
    use ApiResponser;
    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = User::create($request->all());
        $token = $user->createToken('authToken')->plainTextToken;

        return $this->successResponser(
            'ثبت نام شما با موفقیت انجام شد',
            ResponseAlias::HTTP_CREATED,
            ['user' => new UserResource($user), 'token' => $token]
        );
    }
}
