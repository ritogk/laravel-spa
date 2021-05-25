<?php

namespace App\UseCases\Front;

use App\Models\JobCategory;
use Illuminate\Support\Facades\Storage;

class CategoriesAction{
    /**
     * __invoke
     *
     * @return array
     */
    public function __invoke(): array
    {
        $items = JobCategory::select('id',
                                    'name',
                                    'content',
                                    'image',
                                    'sort_no')
                                ->get()
                                ->toArray();
        foreach ($items as &$item) {
            $item['image'] = Storage::url($item['image']);
        }
        return $items;
    }
}
