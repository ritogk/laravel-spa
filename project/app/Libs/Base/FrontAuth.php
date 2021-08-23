<?php
namespace App\Libs\Base;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

trait FrontAuth
{
    use AuthenticatesUsers;

    /**
     * ガード変更
     *
     */
    private function guard()
    {
        return Auth::guard('user');
    }
}
