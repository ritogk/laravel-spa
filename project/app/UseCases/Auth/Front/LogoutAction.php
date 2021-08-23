<?php
namespace App\UseCases\Auth\Front;

use Illuminate\Http\Request;
use App\Libs\Base\FrontAuth;
use Illuminate\Http\JsonResponse;

class LogoutAction{
    use FrontAuth;

    /**
     * __invoke
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $this->guard()->logout();
        $request->session()->regenerateToken();
        return response()->json(['message' => '成功'], 200);
    }
}
