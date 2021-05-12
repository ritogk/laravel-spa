<?php

namespace App\UseCases\Front;

use App\Models\JobCategory;

class CategoriesAction{
    /**
     * __invoke
     *
     * @return array
     */
    public function __invoke(): array
    {
        return JobCategory::select('id',
                                    'name',
                                    'content',
                                    'image',
                                    'sort_no')
                            ->get()
                            ->toArray();
    }
}
