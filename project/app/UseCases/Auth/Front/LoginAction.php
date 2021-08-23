<?php
namespace App\UseCases\Auth\Front;

use Illuminate\Http\Request;
use App\Libs\Base\FrontAuth;
use Illuminate\Http\JsonResponse;

class LoginAction{
    use FrontAuth;

    /**
     * __invoke
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        if ($this->attemptLogin($request)) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return response()->json(['message' => '成功', 'user' => $this->guard()->user()], 200);
        }
        return response()->json(['message' => 'ログイン失敗'], 400);
    }

    /**
     * attemptLogin
     *
     * @param  Request  $request
     * @return bool
     */
    private function attemptLogin(Request $request):bool
    {
        return $this->guard()->attempt($this->credentials($request)
                                        , $request->remember);
    }
}
