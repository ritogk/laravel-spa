<?php

namespace App\UseCases\Master\JobCategory;

use App\Models\JobCategory;
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
        $item = JobCategory::where('id', $id)
                        ->first()
                        ->toArray();
        // ファイルのurlをセット
        if(!empty($item) && array_key_exists('image', $item)){
            $item['image_url'] = Storage::url($item['image']);
        }

        return $item;
    }
}
