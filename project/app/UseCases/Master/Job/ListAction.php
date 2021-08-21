<?php

namespace App\UseCases\Master\Job;

use App\Models\Job;
use Illuminate\Support\Facades\Storage;

class ListAction{
    /**
     * __invoke
     *
     * @param string $filters_json
     * @param array $fileds
     * @return array
     */
    public function __invoke(string $filters_json, array $fileds): array
    {
        $filters = json_decode($filters_json, true);
        $wheres = [];
        if(isset($filters['title']) && $filters['title'] != '') {
            $wheres[] = ['title', 'LIKE', '%'. $filters['title']. '%'];
        }
        if(isset($filters['job_category_id']) && $filters['job_category_id'] != '') {
            $wheres[] = ['job_category_id', '=', $filters['job_category_id']];
        }

        $items = Job::where($wheres)
                    ->select($fileds)
                    ->orderBy('sort_no')
                    ->get()
                    ->toArray();

        // ファイルのurlをセット
        if(count($items) > 1 && array_key_exists('image', $items[0])){
            foreach ($items as &$item) {
                $item['image_url'] = Storage::url($item['image']);
            }
        }

        return $items;
    }
}
