<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginReqeust;
use App\Http\Resources\UserResource;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LoginController extends Controller
{
    use ApiResponser;

    public function login(LoginReqeust $request): \Illuminate\Http\JsonResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = auth()->user();
            $accessToken = $user->createToken('token-name')->plainTextToken;
            $data = [
                'user' => new UserResource($user),
                'access_token' => $accessToken,
            ];
            return $this->successResponser('شما با موفقیت وارد شدید.' , ResponseAlias::HTTP_OK , $data);
        }

        return $this->errorResponser('اطلاعات ورود نادرست است.', ResponseAlias::HTTP_UNAUTHORIZED);
    }
}
