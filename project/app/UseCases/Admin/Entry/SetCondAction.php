<?php

namespace App\UseCases\Admin\Entry;

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
        Session::put(SessionKey::MASTER_ENTRY_LIST_CONDS, $conds);
    }
}
