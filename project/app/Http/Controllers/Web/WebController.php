<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use \Illuminate\Contracts\View\View as View;

class WebController extends Controller
{
    /**
     * 一般画面
     *
     * @return View
     */
    public function index(): View
    {
        return view('front.main');
    }

    /**
     * 管理者ログイン画面
     *
     * @return View
     */
    public function login_admin(): View
    {
        return view('admin.login');
    }

    /**
     * 管理画面
     *
     * @return View
     */
    public function admin(): View
    {
        return view('admin.main');
    }
}
