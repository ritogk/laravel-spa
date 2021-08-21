<?php

namespace App\UseCases\Master\JobCategory;

use App\Models\JobCategory;
use Illuminate\Support\Facades\Storage;

class ListAction{
    /**
     * __invoke
     *
     * @param string $filter
     * @param string $fileds
     * @return array
     */
    public function __invoke(string $filter, string $fileds): array
    {
        $items = JobCategory::where(json_decode($filter, true))
                                ->select(json_decode($fileds, true))
                                ->orderBy('sort_no')
                                ->get()
                                ->toArray();
        // storageパス変換
        if(count($items) >= 1 && array_key_exists('image', $items[0])){
            foreach ($items as &$item) {
                $item['image_url'] = Storage::url($item['image']);
            }
        }
        return $items;
    }
}
