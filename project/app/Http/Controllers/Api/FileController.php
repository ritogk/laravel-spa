<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\UploadRequest;

// usecase
use App\UseCases\File\UploadAction;


class FileController extends Controller
{
    /**
     * ファイル アップロード
     *
     * @param  UploadRequest $request
     * @param  UploadAction $action
     * @return array
     */
    public function upload(UploadRequest $request, UploadAction $action): array
    {
        return $action($request);
    }
}
