<?php

namespace App\UseCases\Admin\Entry;

use App\Models\Entry;

class ListAction{
    /**
     * __invoke
     *
     * @param array $filters
     * @return array
     */
    public function __invoke(array $filters): array
    {
        return Entry::where($filters)
                    ->join('jobs', 'jobs.id', '=', 'entries.job_id')
                    ->select('entries.id',
                            'entries.full_name',
                            'entries.self_pr',
                            'entries.email',
                            'entries.tel',
                            'entries.created_at',
                            'jobs.title as job_nm')
                    ->orderBy('entries.created_at')
                    ->get()
                    ->toArray();
    }
}
