<?php

namespace App\UseCases\Admin\Master\JobCategory;

use Session;
use App\Libs\SessionKey;

class SetCondAction{
    /**
     * __invoke
     *
     * @param array $conds
     * @return void
     */
    public function __invoke(array $conds): void
    {
        Session::get(SessionKey::MASTER_JOB_CATEGORY_LIST_CONDS, $conds);
    }
}
