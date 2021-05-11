<?php

namespace App\UseCases\Front;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchJobsAction{
    /**
     * __invoke
     *
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        $filters = [];
        if(isset($request->category)) {
            $filters[] = ['job_category_id', '=', $request->category];
        }
        if(isset($request->content)) {
            $filters[] = ['content', 'LIKE', '%'. $request->content. '%'];
        }
        if(isset($request->price)) {
            $filters[] = ['price', '>=', $request->price];
        }
        if($request->attention) {
            $filters[] = ['attention', '=', $request->attention];
        }
        return Job::where($filters)
                    ->select('id',
                            'title',
                            'content',
                            'attention',
                            'job_category_id',
                            'image',
                            'sort_no')
                    ->get()
                    ->toArray();
    }
}
