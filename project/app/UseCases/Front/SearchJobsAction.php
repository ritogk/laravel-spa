<?php

namespace App\UseCases\Front;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SearchJobsAction{
    /**
     * __invoke
     *
     * @param array $inputs
     * @return array
     */
    public function __invoke(array $inputs): array
    {
        $filters = [];
        if(isset($inputs['category'])) {
            $filters[] = ['job_category_id', '=', $inputs['category']];
        }
        if(isset($inputs['content'])) {
            $filters[] = ['content', 'LIKE', '%'. $inputs['content']. '%'];
        }
        if(isset($inputs['price'])) {
            $filters[] = ['price', '>=', $inputs['price']];
        }
        if($inputs['attention']) {
            $filters[] = ['attention', '=', $inputs['attention']];
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
                    ->orderBy('sort_no')
                    ->get()
                    ->toArray();

        foreach ($items as &$item) {
            $item['image'] = Storage::url($item['image']);
        }
        return $items;
    }
}
