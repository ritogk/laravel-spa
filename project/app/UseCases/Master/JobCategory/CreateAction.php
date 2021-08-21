<?php

namespace App\UseCases\Master\JobCategory;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class CreateAction{
    /**
     * __invoke
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request): void
    {
        $create = [
            'name' => $request->name,
            'content' => $request->content,
            'image' => $request->image,
            'sort_no' => $request->sort_no,
        ];
        JobCategory::create($create);
    }
}
