<?php

namespace App\UseCases\Master\JobCategory;

use App\Models\JobCategory;
use Illuminate\Http\Request;

class UpdateAction{
    /**
     * __invoke
     *
     * @param string $id
     * @param Request $request
     * @return void
     */
    public function __invoke(string $id, Request $request): void
    {
        $update = [
            'name' => $request->name,
            'content' => $request->content,
            'image' => $request->image,
            'sort_no' => $request->sort_no,
        ];
        JobCategory::where('id', $id)->update($update);
    }
}
