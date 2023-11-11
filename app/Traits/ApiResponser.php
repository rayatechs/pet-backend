<?php


namespace App\Traits;

trait ApiResponser
{
    protected function   errorResponser($message = [], $code): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => false,
            'errors' => $message
        ], $code);
    }

    protected function successResponser($message = [], $code, $data = []): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'Success',
            'mesages' => $message,
            'data'   => $data
        ], $code);
    }
}
