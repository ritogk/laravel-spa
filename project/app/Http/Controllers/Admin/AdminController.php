<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \Illuminate\Contracts\View\View as View;

class AdminController extends Controller
{
    /**
     * 画面表示
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin');
    }
}
