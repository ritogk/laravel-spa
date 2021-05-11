<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Master\JobListRequest;
use App\Http\Requests\Admin\Master\JobRequest;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

// usecase
use App\UseCases\Admin\Master\Job\ListAction;
use App\UseCases\Admin\Master\Job\CreateAction;
use App\UseCases\Admin\Master\Job\UpdateAction;
use App\UseCases\Admin\Master\Job\DeleteAction;
use App\UseCases\Admin\Master\Job\FindAction;
use App\UseCases\Admin\Master\Job\ExportAction;
use App\UseCases\Admin\Master\Job\SetCondAction;
use App\UseCases\Admin\Master\Job\GetCondAction;


class JobController extends Controller
{
    /**
     * 一覧取得
     *
     * @param  JobListRequest $request
     * @param  ListAction $action
     * @return array
     */
    public function list(JobListRequest $request, ListAction $action): array
    {
        return $action($request->filters());
    }

    /**
     * 登録
     *
     * @param JobRequest $request
     * @param CreateAction $action
     * @return void
     */
    public function create(JobRequest $request, CreateAction $action)
    {
        $action($request);
    }

    /**
     * 更新
     *
     * @param  JobRequest $request
     * @param  UpdateAction $action
     * @return void
     */
    public function update(JobRequest $request, UpdateAction $action): void
    {
        $action($request);
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
     * 一件取得
     *
     * @param  Request $request
     * @param  FindAction $action
     * @return array
     */
    public function find(Request $request, FindAction $action): array
    {
        return $action($request->id);
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
     * @param  JobListRequest $request
     * @param  SetCondAction $action
     * @return void
     */
    public function setConds(JobListRequest $request, SetCondAction $action) : void
    {
        $action($request->all());
    }
}
