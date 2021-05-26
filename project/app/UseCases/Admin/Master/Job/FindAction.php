<?php

namespace App\UseCases\Admin\Master\Job;

use App\Models\Job;
use Illuminate\Support\Facades\Storage;

class FindAction{
    /**
     * __invoke
     *
     * @param string $id
     * @return array
     */
    public function __invoke(string $id): array
    {
        $job = Job::where('id', $id)
                    ->select('id', 'title', 'content', 'attention', 'job_category_id', 'price', 'image', 'sort_no', 'welfare', 'holiday')
                    ->first()
                    ->toArray();
        $job['image'] = Storage::url($job['image']);
        return $job;
    }
}
