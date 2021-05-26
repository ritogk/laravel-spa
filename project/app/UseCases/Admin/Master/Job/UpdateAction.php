<?php

namespace App\UseCases\Admin\Master\Job;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateAction{
    /**
     * __invoke
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request): void
    {
        DB::transaction(function () use($request){
            if(!empty($request->file)){
                $path = Storage::putFile('public/images', $request->file, 'public');
            }else{
                $path = Job::find($request->item['id'])->image;
            }

            $update = [
                'title' => $request->item['title'],
                'content' => $request->item['content'],
                'attention' => $request->item['attention'],
                'job_category_id' => $request->item['job_category_id'],
                'price' => $request->item['price'],
                'welfare' => $request->item['welfare'],
                'holiday' => $request->item['holiday'],
                'image' => $path,
                'sort_no' => $request->item['sort_no'],
            ];
            Job::where('id', $request->item['id'])->update($update);
        });
    }
}
