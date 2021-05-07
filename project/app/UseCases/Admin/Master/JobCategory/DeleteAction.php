<?php

namespace App\UseCases\Admin\Master\JobCategory;

use App\Models\JobCategory;

class DeleteAction{
    /**
     * __invoke
     *
     * @param string $id
     * @return void
     */
    public function __invoke(string $id): void
    {
        JobCategory::where('id', $id)->delete();
    }
}