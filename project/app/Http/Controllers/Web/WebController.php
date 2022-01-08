<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use \Illuminate\Contracts\View\View as View;
use App\OpenAPI\Model\Sex;
use App\OpenAPI\Model\GetHealthResponse;

class WebController extends Controller
{
    /**
     * 一般画面
     *
     * @return View
     */
    public function index(): View
    {
        $container = null;
        $container['status'] = 1;
        $container['bb'] = 1;
        $container['cc'] = 1;
        $a = new GetHealthResponse($container);
        $b = json_encode($a);
        \Log::debug($a);
        \Log::debug(Sex::WOMAN);
        \Log::debug(Sex::MAN);

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
