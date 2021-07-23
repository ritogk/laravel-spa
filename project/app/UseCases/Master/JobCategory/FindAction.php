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
                        ->select('id', 'name', 'content', 'image', 'sort_no', 'updated_at')
                        ->first()
                        ->toArray();
        $item['image'] = Storage::url($item['image']);

        return $item;
    }
}
