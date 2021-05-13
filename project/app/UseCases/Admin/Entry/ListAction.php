<?php

namespace App\UseCases\Admin\Entry;

use App\Models\Entry;
use Illuminate\Http\Request;

class ListAction{
    /**
     * __invoke
     *
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        $filters = [];
        if(isset($request->full_name)) {
            $filters[] = ['full_name', 'LIKE', '%'. $request->full_name. '%'];
        }
        return Entry::where($filters)
                    ->join('jobs', 'jobs.id', '=', 'entries.job_id')
                    ->join('job_categories', 'job_categories.id', '=', 'jobs.job_category_id')
                    ->select('entries.id',
                            'entries.full_name',
                            'entries.self_pr',
                            'entries.email',
                            'entries.tel',
                            'entries.created_at',
                            'jobs.title as job_nm',
                            'job_categories.name as job_categories_nm')
                    ->orderBy('entries.created_at')
                    ->orderBy('jobs.title')
                    ->get()
                    ->toArray();
    }
}
