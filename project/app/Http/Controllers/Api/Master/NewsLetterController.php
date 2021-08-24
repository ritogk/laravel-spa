<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\ListRequest;
use App\Http\Requests\Master\NewsLetterRequest;
use Illuminate\Http\Request;

// usecase
use App\UseCases\Master\NewsLetter\ListAction;
use App\UseCases\Master\NewsLetter\CreateAction;
use App\UseCases\Master\NewsLetter\UpdateAction;
use App\UseCases\Master\NewsLetter\DeleteAction;
use App\UseCases\Master\NewsLetter\FindAction;
use App\UseCases\Master\NewsLetter\SendAction;

class NewsLetterController extends Controller
{
    /**
     * メルマガ 一覧取得
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
     * メルマガ 登録
     *
     * @param NewsLetterRequest $request
     * @param CreateAction $action
     * @return array
     */
    public function create(NewsLetterRequest $request, CreateAction $action): array
    {
        return $action($request);
    }

    /**
     * メルマガ 更新
     *
     * @param  NewsLetterRequest $request
     * @param string $id
     * @param  UpdateAction $action
     * @return array
     */
    public function update(NewsLetterRequest $request, string $id, UpdateAction $action): array
    {
        return $action($request, $id);
    }

    /**
     * メルマガ 削除
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
     * メルマガ 一件取得
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
     * メルマガ 送信
     *
     * @param  Request $request
     * @param  string $id
     * @param  SendAction $action
     * @return array
     */
    public function send(Request $request, string $id, SendAction $action): array
    {
        return $action($id);
    }
}
