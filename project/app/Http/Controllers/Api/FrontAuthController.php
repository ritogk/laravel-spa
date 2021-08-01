<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class FrontAuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * ログイン済ユーザー情報 取得
     *
     * @return \App\Models\User|null
     */
    public function user()
    {
        return $this->guard()->user();
    }

    /**
     * ログイン
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'remember' => 'required|boolean',
        ]);

        if ($this->attemptLogin($request)) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return response()->json(['message' => '成功'], 200);
        }

        return response()->json(['message' => '失敗'], 422);
    }

    /**
     * ログアウト
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
     * @param $credentials
     * @return mixed
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
        return Auth::guard('user');
    }
}
