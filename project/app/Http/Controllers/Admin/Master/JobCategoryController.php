<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Master\JobCategoryListRequest;
use App\Http\Requests\Admin\Master\JobCategoryRequest;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

// usecase
use App\UseCases\Admin\Master\JobCategory\ListAction;
use App\UseCases\Admin\Master\JobCategory\CreateAction;
use App\UseCases\Admin\Master\JobCategory\UpdateAction;
use App\UseCases\Admin\Master\JobCategory\DeleteAction;
use App\UseCases\Admin\Master\JobCategory\ExportAction;
use App\UseCases\Admin\Master\JobCategory\SetCondAction;
use App\UseCases\Admin\Master\JobCategory\GetCondAction;


class JobCategoryController extends Controller
{
    /**
     * 一覧取得
     *
     * @param  JobCategoryListRequest $request
     * @param  ListAction $action
     * @return array
     */
    public function list(JobCategoryListRequest $request, ListAction $action): array
    {
        return $action($request->filters());
    }

    /**
     * 登録
     *
     * @param JobCategoryRequest $request
     * @param CreateAction $action
     * @return void
     */
    public function create(JobCategoryRequest $request, CreateAction $action)
    {
        $action($request->all());
    }

    /**
     * 更新
     *
     * @param  JobCategoryRequest $request
     * @param  string $id
     * @param  UpdateAction $action
     * @return void
     */
    public function update(JobCategoryRequest $request, string $id, UpdateAction $action): void
    {
        $action($request->all(), $id);
    }

    /**
     * 削除
     *
     * @param string $id
     * @param DeleteAction $action
     * @return void
     */
    public function destroy(string $id, DeleteAction $action)
    {
        $action($id);
    }

    /**
     * excel出力
     *
     * @param ExportAction $action
     * @return BinaryFileResponse
     */
    public function exportExcel(ExportAction $action): BinaryFileResponse{
        return $action();
    }

    /**
     * 入力条件取得
     *
     * @param  Request $request
     * @param  GetCondAction $action
     * @return array
     */
    public function getConds(Request $request, GetCondAction $action) : array
    {
        return $action($request->isInit);
    }

    /**
     * 入力条件セット
     *
     * @param  JobCategoryListRequest $request
     * @param  SetCondAction $action
     * @return void
     */
    public function setConds(JobCategoryListRequest $request, SetCondAction $action) : void
    {
        $action($request->all());
    }
}
