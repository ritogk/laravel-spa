<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\Admin\LoginRequest;
use phpDocumentor\Reflection\Types\Boolean;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * 管理者 取得
     *
     * @return \App\Models\User|null
     */
    public function user()
    {
        return $this->guard()->user();
    }

    /**
     * 管理者 ログイン
     *
     * @param  LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        if ($this->attemptLogin($request)) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return response()->json(['message' => '成功'], 200);
        }

        return response()->json(['message' => 'ログイン失敗'], 400);
    }

    /**
     * 管理者 ログアウト
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function logout(Request $request){
        $this->guard()->logout();
        $request->session()->regenerateToken();
        return response()->json(['message' => '成功'], 200);
    }

    /**
     *
     * @param  Request  $request
     * @return bool
     */
    private function attemptLogin(Request $request)
    {
        return $this->guard()->attempt($this->credentials($request)
                                        , $request->remember);
    }

    /**
     * ガード変更
     *
     */
    private function guard()
    {
        return Auth::guard('admin');
    }
}
