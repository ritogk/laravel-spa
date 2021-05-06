<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Master\GeneralListRequest;
use App\Http\Requests\Admin\Master\GeneralRequest;

use Symfony\Component\HttpFoundation\BinaryFileResponse;

// usecase
use App\UseCases\Admin\Master\General\ListAction;
use App\UseCases\Admin\Master\General\CreateAction;
use App\UseCases\Admin\Master\General\UpdateAction;
use App\UseCases\Admin\Master\General\DeleteAction;
use App\UseCases\Admin\Master\General\ExportAction;
use App\UseCases\Admin\Master\General\SetCondAction;
use App\UseCases\Admin\Master\General\GetCondAction;


class GeneralController extends Controller
{
    /**
     * 一覧取得
     *
     * @param  GeneralListRequest $request
     * @param  ListAction $action
     * @return array
     */
    public function list(GeneralListRequest $request, ListAction $action): array
    {
        return $action($request->filters());
    }

    /**
     * 登録
     *
     * @param GeneralRequest $request
     * @param CreateAction $action
     * @return void
     */
    public function create(GeneralRequest $request, CreateAction $action)
    {
        $action($request->all());
    }

    /**
     * 更新
     *
     * @param  GeneralRequest $request
     * @param  string $id
     * @param  UpdateAction $action
     * @return void
     */
    public function update(GeneralRequest $request, $id, UpdateAction $action): void
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
     * @param  GeneralListRequest $request
     * @param  SetCondAction $action
     * @return void
     */
    public function setConds(GeneralListRequest $request, SetCondAction $action) : void
    {
        $action($request->all());
    }
}
