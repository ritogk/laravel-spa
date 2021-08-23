<?php
namespace App\UseCases\Auth\Admin;

use Illuminate\Http\Request;
use App\Libs\Base\AdminAuth;
use Illuminate\Http\JsonResponse;

class LogoutAction{
    use AdminAuth;

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
