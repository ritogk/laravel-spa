<?php

namespace App\UseCases\Admin\Master;

use App\Models\General;

class CreateAction{
    /**
     * __invoke
     *
     * @param array $general
     * @return void
     */
    public function __invoke(array $general): void
    {
        $code_max = General::withTrashed()->where('kbn', $general['kbn'])->max('code');
        $general['code'] = $code_max ? (int)$code_max + 1 : 1;
        General::create($general);
    }
}
