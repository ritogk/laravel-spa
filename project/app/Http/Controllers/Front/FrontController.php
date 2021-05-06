<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use \Illuminate\Contracts\View\View as View;

// UseCases
use App\UseCases\Front\ShowAction as ShowAction;

class FrontController extends Controller
{
    /**
     * 画面表示
     *
     * @param ShowAction $action
     * @return View
     */
    public function index(ShowAction $action): View
    {
        return $action();
    }
}
