<?php
namespace App\UseCases\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;
class UploadAction{
    /**
     * __invoke
     *
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        $storage_path = Storage::putFile('public/images', $request->file, 'public');
        $url = Storage::url($storage_path);
        return ['storage_path' => $storage_path, 'url' => $url];
    }
}
