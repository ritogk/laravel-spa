<?php

namespace App\UseCases\Admin\Master\JobCategory;

use App\Models\JobCategory;

class UpdateAction{
    /**
     * __invoke
     *
     * @param array $job_category
     * @param string $id
     * @return void
     */
    public function __invoke(array $job_category, string $id): void
    {
        $update = [
            'name' => $job_category['name'],
            'sort_no' => $job_category['sort_no']
        ];
        JobCategory::where('id', $id)->update($update);
    }
}
