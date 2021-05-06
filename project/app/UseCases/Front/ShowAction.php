<?php

namespace App\UseCases\Front;

use \Illuminate\Contracts\View\View as View;

class ShowAction{
    /**
     * __invoke
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('front');
    }
}
