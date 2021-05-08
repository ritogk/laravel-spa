<?php

namespace App\UseCases\Admin\Master\Job;

use App\Models\Job;

class ListAction{
    /**
     * __invoke
     *
     * @param array $filters
     * @return array
     */
    public function __invoke(array $filters): array
    {
        return Job::where($filters)
                    ->join('job_categories', 'job_categories.id', '=', 'jobs.job_category_id')
                    ->select('jobs.id',
                            'jobs.title',
                            'jobs.content',
                            'job_categories.name as job_category_nm',
                            'jobs.price')
                    ->orderBy('jobs.sort_no')
                    ->get()
                    ->toArray();
    }
}
