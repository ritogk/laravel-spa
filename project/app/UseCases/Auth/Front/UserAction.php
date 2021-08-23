<?php
namespace App\UseCases\Auth\Front;

use App\Libs\Base\FrontAuth;


class UserAction{
    use FrontAuth;

    /**
     * __invoke
     *
     * @return \App\Models\User|null
     */
    public function __invoke()
    {
        return $this->guard()->user();
    }
}
