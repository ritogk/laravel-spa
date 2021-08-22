<?php

namespace App\UseCases\Master\JobCategory;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class CreateAction{
    /**
     * __invoke
     *
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        $create = [
            'name' => $request->name,
            'content' => $request->content,
            'image' => $request->image,
            'sort_no' => $request->sort_no,
        ];
        return JobCategory::create($create)->toArray();
    }
}
