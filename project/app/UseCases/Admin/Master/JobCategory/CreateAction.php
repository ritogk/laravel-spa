<?php

namespace App\UseCases\Admin\Master\JobCategory;

use App\Models\JobCategory;

class CreateAction{
    /**
     * __invoke
     *
     * @param array $job_category
     * @return void
     */
    public function __invoke(array $job_category): void
    {
        JobCategory::create($job_category);
    }
}
