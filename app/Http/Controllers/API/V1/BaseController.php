<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    public function sendResponse(
        string $message,
        mixed $result = [],
        int $status_code = 200
    ): JsonResponse {
        $res = [
            "success" => true,
            "message" => $message,
            "data" => $result,
        ];

        return response()->json($res, $status_code);
    }

    public function sendError(
        string $error,
        int $status_code = 500
    ): JsonResponse {
        $res = [
            "success" => false,
            "message" => $error,
        ];

        return response()->json($res, $status_code);
    }
}
