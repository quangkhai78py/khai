<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

abstract class ApiController extends Controller
{
    protected $statusCode = Response::HTTP_OK;

	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @function respond.
     * @description Response data json to client.
     * @param $error
     * @param $data
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    private function respond($error, $data, $message)
    {
	    return response()->json([
            'status' => $this->getStatusCode(),
            'error' => $error,
            'data' => $data,
            'message' => $message
        ]);
    }

    /**
     * @function responseSuccess.
     * @description Response to client when success.
     * @param $options
     * @return \Illuminate\Http\JsonResponse
     */
    private function responseSuccess($options)
    {
        $data = $options['data'] ? $options['data'] : null;
        $message = $options['message'] ? $options['message'] : 'success';
        $error = 0;
        $statusCode = 200;
	    return $this->setStatusCode($statusCode)->respond($error, $data, $message);
    }

    /**
     * @function responseError.
     * @description Response  to client when error.
     * @param $options
     * @return \Illuminate\Http\JsonResponse
     */
    private function responseError($options)
    {
        $data = $options['data'] ? $options['data'] : null;
        $message = $options['message'] ? $options['message'] : 'bad_request';
        $error = $options['error'] ? $options['error'] : 400;
        $statusCode = 400;
        return $this->setStatusCode($statusCode)->respond($error, $data, $message);
    }

    /**
     * @function createdSuccess.
     * @description Response to client when created success.
     * @param $options
     * @return \Illuminate\Http\JsonResponse
     */
    private function createdSuccess($options)
    {
        $data = $options['data'] ? $options['data'] : null;
        $message = $options['message'] ? $options['message'] : 'success';
        $error = 0;
        $statusCode = 201;
        return $this->setStatusCode($statusCode)->respond($error, $data, $message);
    }

    /**
     * @function internalServerError.
     * @description Response to client when the server has error.
     * @param $options
     * @return \Illuminate\Http\JsonResponse
     */
    protected function internalServerError($options) {
        $data = $options['data'] ? $options['data'] : null;
        $message = $options['message'] ? $options['message'] : 'internal_server_error';
        $error = $options['error'] ? $options['error'] : 500;
        $statusCode = 500;
        return $this->setStatusCode($statusCode)->respond($error, $data, $message);
    }

    /**
     * @function successResponse.
     * @description Response to client when call api success or error.
     * @param $options
     * @return \Illuminate\Http\JsonResponse
     */
    protected function successResponse($options)
    {
	    if($options['error'] && $options['error'] > 0) {
	        return $this->responseError($options);
        }

	    return $this->responseSuccess($options);
    }

    /**
     * @function successResponse.
     * @description Response to client when call api created success or error.
     * @param $options
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createdResponse($options)
    {
        if($options['error'] && $options['error'] > 0) {
            return $this->responseError($options);
        }

        return $this->createdSuccess($options);
    }
}
