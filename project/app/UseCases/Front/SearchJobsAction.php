<?php

namespace App\UseCases\Front;

use App\Models\Job;
use Illuminate\Support\Facades\Storage;

class SearchJobsAction{
    /**
     * __invoke
     *
     * @return array
     */
    public function __invoke(): array
    {
        $items = Job::select('id',
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
