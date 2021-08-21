<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\ListRequest;
use App\Http\Requests\Master\JobRequest;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

// usecase
use App\UseCases\Master\Job\ListAction;
use App\UseCases\Master\Job\CreateAction;
use App\UseCases\Master\Job\UpdateAction;
use App\UseCases\Master\Job\DeleteAction;
use App\UseCases\Master\Job\FindAction;
use App\UseCases\Master\Job\ExportAction;


class JobController extends Controller
{
    /**
     * 仕事 一覧取得
     *
     * @param  ListRequest $request
     * @param  ListAction $action
     * @return array
     */
    public function index(ListRequest $request, ListAction $action): array
    {
        return $action($request->filter, $request->fields);
    }

    /**
     * 仕事 登録
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
     * 仕事 更新
     *
     * @param  JobRequest $request
     * @param string $id
     * @param  UpdateAction $action
     * @return void
     */
    public function update(JobRequest $request, string $id, UpdateAction $action): void
    {
        $action($request, $id);
    }

    /**
     * 仕事 削除
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
     * 仕事 一件取得
     *
     * @param string $id
     * @param  FindAction $action
     * @return array
     */
    public function find(String $id, FindAction $action): array
    {
        return $action($id);
    }

    /**
     * 仕事 excel取得
     *
     * @param ExportAction $action
     * @return BinaryFileResponse
     */
    public function excel(ExportAction $action): BinaryFileResponse{
        return $action();
    }
}
