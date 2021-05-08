<?php

namespace App\UseCases\Admin\Master\Job;

use Session;
use App\Libs\SessionKey;

class GetCondAction{
    /**
     * __invoke
     *
     * @param bool $isInit
     * @return array
     */
    public function __invoke(bool $isInit): array
    {
        $rtn = [];
        if($isInit){
            Session::forget(SessionKey::MASTER_JOB_CATEGORY_LIST_CONDS);
        }else{
            $session_val = Session::get(SessionKey::MASTER_JOB_CATEGORY_LIST_CONDS);
            $rtn = $session_val ?? [];
        }
        return $rtn;
    }
}

