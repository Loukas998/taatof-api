<?php

namespace App\Http\Helpers;

class ApiResponse
{
    public static function success($data = [], $message = null, $status = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public static function error($message, $status = 400, $data = []): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public static function response($status, $code, $message, $data = []): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public static function notFound(string $message = 'Not Found', $data = []): \Illuminate\Http\JsonResponse

    {
        return response()->json([
            'status' => 404,
            'message' => $message,
            'data' => $data
        ], 404);
    }
}