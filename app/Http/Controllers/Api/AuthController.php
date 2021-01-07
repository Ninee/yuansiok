<?php

namespace App\Http\Controllers\Api;

use App\Models\WxUser;
use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh']]);
    }

    /**
     * Get a JWT via given credentials.
     *Unauthorized
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $admin = Administrator::where('username', request('username'))->first();
        if (!$admin) {
            return json_response('', '用户不存在', 500);
        } else {
            $verify = Hash::check(request('password'), $admin->password);
            if (!$verify) {
                return json_response('', '密码错误', 500);
            } else {
                //检查是否有绑定的微信用户
                $user = WxUser::firstOrCreate(['admin_id' => $admin->id], []);
                $token = \auth('api')->login($user);
                return json_response($token);
            }
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
