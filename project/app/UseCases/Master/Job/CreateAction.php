<?php
namespace App\UseCases\Master\Job;

use App\Models\Job;
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
        Job::create($create);
    }
}
