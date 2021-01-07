<?php
if (! function_exists('exception_response')) {
    /**
     * 异常响应.
     *
     * @param Exception $exception
     * @param string    $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function exception_response(Exception $exception, string $message = '')
    {
        return response()->json([
            'msg' => $message ?: $exception->getMessage(),
            'code' => $exception->getCode() ?: 500,
        ]);
    }
}

if (! function_exists('exception_record')) {
    /**
     * 记录异常.
     *
     * @param Exception $exception
     */
    function exception_record(Exception $exception): void
    {
        \Log::error([
            'file' => $exception->getFile(),
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTraceAsString(),
        ]);
    }
}

if (! function_exists('json_response')) {

    /**
     * 统一成功响应
     *
     * @param $data
     * @param string $message
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    function json_response($data, $message = '', $code = 0)
    {
        return response()->json([
            'data' => $data,
            'msg' => $message,
            'code' => $code,
        ]);
    }
}

if (! function_exists('gen_order_no')) {
    /**
     * 生成订单号.
     *
     * @param \App\User $user
     *
     * @return string
     */
    function gen_order_no(\App\User $user)
    {
        $userId = str_pad($user->id, 10, 0, STR_PAD_LEFT);
        $time = date('His');
        $rand = mt_rand(10, 99);

        return $time.$rand.$userId;
    }
}