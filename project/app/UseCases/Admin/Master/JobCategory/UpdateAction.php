<?php

namespace App\UseCases\Admin\Master\JobCategory;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateAction{
    /**
     * __invoke
     *
     * @param String $id
     * @param Request $request
     * @return void
     */
    public function __invoke(String $id, Request $request): void
    {
        DB::transaction(function () use($request, $id){
            if(!empty($request->file)){
                $path = Storage::putFile('public/images', $request->file, 'public');
            }else{
                $path = JobCategory::find($id)->image;
            }

            $update = [
                'name' => $request->item['name'],
                'content' => $request->item['content'],
                'image' => $path,
                'sort_no' => $request->item['sort_no'],
            ];
            JobCategory::where('id', $id)->update($update);
        });
    }
}
