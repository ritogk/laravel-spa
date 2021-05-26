<?php

namespace App\UseCases\Front;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $items = Job::where($filters)
                    ->select('id',
                            'title',
                            'content',
                            'attention',
                            'job_category_id',
                            'price',
                            'welfare',
                            'holiday',
                            'image',
                            'sort_no')
                    ->orderByDesc('attention')
                    ->get()
                    ->toArray();

        foreach ($items as &$item) {
            $item['image'] = Storage::url($item['image']);
        }
        return $items;
    }
}
