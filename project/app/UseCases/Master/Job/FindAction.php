<?php

namespace App\UseCases\Master\Job;

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
        $item = Job::where('id', $id)
                    ->select('id', 'title', 'content', 'attention', 'job_category_id', 'price', 'image', 'sort_no', 'welfare', 'holiday')
                    ->first()
                    ->toArray();
        // ファイルのurlをセット
        if(!empty($item) && array_key_exists('image', $item)){
            $item['image_url'] = Storage::url($item['image']);
        }
        return $item;
    }
}
