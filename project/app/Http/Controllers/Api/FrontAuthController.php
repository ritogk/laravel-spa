<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\Front\LoginRequest;
use App\Http\Requests\Auth\Front\RegisterRequest;

use App\UseCases\Auth\Front\LoginAction;
use App\UseCases\Auth\Front\LogoutAction;
use App\UseCases\Auth\Front\UserAction;
use App\UseCases\Auth\Front\RegisterAction;

class FrontAuthController extends Controller
{
   /**
    * 会員 取得
    *
    * @param  UserAction $action
    * @return \App\Models\User|null
    */
   public function user(UserAction $action)
   {
       return $action();
   }

   /**
     * 会員 登録
     *
     * @param  RegisterRequest  $request
     * @param  RegisterAction $action
     * @return JsonResponse
     */
    public function register(RegisterRequest $request, RegisterAction $action)
    {
        return $action($request);
    }

   /**
    * 会員 ログイン
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
    * 会員 ログアウト
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
