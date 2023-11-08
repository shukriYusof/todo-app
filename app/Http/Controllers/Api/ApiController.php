<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    protected $errors = false;

    /**
     * Respond with a JSON response.
     *
     * @param mixed $data
     * @param int $status
     * @return JsonResponse
     */
    protected function respondWithJson($data, $status = 200)
    {
        return response()->json($data, $status);
    }

    /**
     * Respond with a successful JSON response.
     *
     * @param string $message
     * @param mixed|null $resource
     * @param int|null $statusCode
     * @return JsonResponse
     */
    protected function successJsonResponse(string $message, $resource = null, $statusCode = 200)
    {
        $response = [
            'statusCode' => $statusCode,
            'message' => $message,
            'errors' => $this->errors,
            'response' => is_array($resource) && array_key_exists('data', $resource) ? $resource['data'] : $resource,
        ];

        return $this->respondWithJson($response);
    }

    /**
     * Respond with an error JSON response.
     *
     * @param string $message
     * @param mixed|null $data
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function errorJsonResponse(string $message, $data = null, $statusCode = 400)
    {
        $response = [
            'statusCode' => $statusCode,
            'message' => $message,
            'errors' => true,
            'response' => $data,
        ];

        return $this->respondWithJson($response);
    }
}
