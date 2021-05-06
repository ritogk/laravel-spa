<?php

namespace App\UseCases\Admin\Master;

use App\Models\General;

class ListAction{
    /**
     * __invoke
     *
     * @param array $filters
     * @return array
     */
    public function __invoke(array $filters): array
    {
        return General::where($filters)
                        ->where('changeable', 1)
                        ->orderBy('kbn')
                        ->orderBy('sort_no')
                        ->get()
                        ->toArray();
    }
}
