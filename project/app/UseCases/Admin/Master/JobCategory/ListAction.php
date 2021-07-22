<?php

namespace App\UseCases\Admin\Master\JobCategory;

use App\Models\JobCategory;
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
        if(isset($filters['name']) && $filters['name'] != '') {
            $wheres[] = ['name', 'LIKE', '%'. $filters['name']. '%'];
        }

        $items = JobCategory::where($wheres)
                                ->select($fileds)
                                ->orderBy('sort_no')
                                ->get()
                                ->toArray();
        // storageパス変換
        if(count($items) > 1 && array_key_exists('image', $items[0])){
            foreach ($items as &$item) {
                $item['image'] = Storage::url($item['image']);
            }
        }
        return $items;
    }
}
