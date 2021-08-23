<?php
namespace App\Libs\Base;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\Admin\LoginRequest;

trait AdminAuth
{
    use AuthenticatesUsers;

    /**
     * ガード変更
     *
     */
    private function guard()
    {
        return Auth::guard('admin');
    }
}
