<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * ログインユーザー情報
     *
     * @return \App\Models\User|null
     */
    public function user()
    {
        return Auth::user();
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
            $this->sendLoginResponse($request);
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
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => '成功'], 200);
    }

    /**
     * @param  Request  $request
     * @param $credentials
     * @return mixed
     */
    private function attemptLogin(Request $request)
    {
        return $this->guard()->attempt($this->credentials($request)
                                        , $request->remember);
    }

}
