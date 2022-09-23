<?php

namespace App\Traits;

use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as FoundationResponse;

trait ApiResponse
{
    protected $headers = [];

    public function setHeader($key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }

    /**
     * @param       $data
     * @param array $header
     * @return mixed
     */
    public function respond($data, $msg, $code)
    {
        $res = [
            'code' => $code,
            'message' => $msg,
            'data' => $data,
        ];
        return Response::json($res, FoundationResponse::HTTP_OK, $this->headers);
    }

    /**
     * @param array $data
     * @param string $msg
     * @return mixed
     */
    public function success($data = array(), $msg = "success")
    {
        return $this->respond($data, $msg, FoundationResponse::HTTP_OK);
    }

    /**
     * @param string $message
     * @param int $code
     * @return mixed
     */
    public function failed($msg = "failed", $code = FoundationResponse::HTTP_BAD_REQUEST)
    {
        return $this->respond(array(), $msg, $code);
    }

    /**
     * @param string $msg
     * @param int $code
     * @return mixed
     */
    public function message($msg = "success", $code = FoundationResponse::HTTP_OK)
    {
        return $this->respond(array(), $msg, $code);
    }
}
