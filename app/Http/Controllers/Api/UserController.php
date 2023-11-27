<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{


    /**
     * Display the specified resource.
     */
    public function show()
    {
        return $this->successResponser('بازگشت اطلاعات با موفقیت انجام شد', Response::HTTP_OK, new UserResource(auth()->user()));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
}
