<?php

namespace App\UseCases\Master\Job;

use App\Models\Job;
use Illuminate\Http\Request;

class UpdateAction{
    /**
     * __invoke
     *
     * @param Request $request
     * @param string $id
     * @return void
     */
    public function __invoke(Request $request, string $id): void
    {
        $update = [
            'title' => $request->title,
            'content' => $request->content,
            'attention' => $request->attention,
            'job_category_id' => $request->job_category_id,
            'price' => $request->price,
            'welfare' => $request->welfare,
            'holiday' => $request->holiday,
            'image' => $request->image,
            'sort_no' => $request->sort_no,
        ];
        Job::where('id', $id)->update($update);
    }
}
