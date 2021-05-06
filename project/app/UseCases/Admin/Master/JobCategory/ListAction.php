<?php

namespace App\UseCases\Admin\Master\JobCategory;

use App\Models\JobCategory;

class ListAction{
    /**
     * __invoke
     *
     * @param array $filters
     * @return array
     */
    public function __invoke(array $filters): array
    {
        return JobCategory::where($filters)
                        ->orderBy('sort_no')
                        ->get()
                        ->toArray();
    }
}
