<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\Admin\LoginRequest;

// usecase
use App\UseCases\Auth\Admin\LoginAction;
use App\UseCases\Auth\Admin\LogoutAction;
use App\UseCases\Auth\Admin\UserAction;

class AdminAuthController extends Controller
{
    /**
     * 管理者 取得
     *
     * @param  UserAction $action
     * @return \App\Models\User|null
     */
    public function user(UserAction $action)
    {
        return $action();
    }

    /**
     * 管理者 ログイン
     *
     * @param  LoginRequest $request
     * @param  LoginAction $action
     * @return JsonResponse
     */
    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        return $action($request);
    }

    /**
     * 管理者 ログアウト
     *
     * @param  Request $request
     * @param  LogoutAction $action
     * @return JsonResponse
     */
    public function logout(Request $request, LogoutAction $action): JsonResponse
    {
        return $action($request);
    }
}
