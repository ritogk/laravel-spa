<?php
namespace App\UseCases\Auth\Admin;

use App\Libs\Base\AdminAuth;


class UserAction{
    use AdminAuth;

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
