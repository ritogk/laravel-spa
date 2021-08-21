<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\EntryListRequest;
use App\Http\Requests\Master\EntryRequest;

// usecase
use App\UseCases\Master\Entry\ListAction;
use App\UseCases\Master\Entry\CreateAction;

class EntryController extends Controller
{
    /**
     * 求人申込 一覧取得
     *
     * @param  EntryListRequest $request
     * @param  ListAction $action
     * @return array
     */
    public function index(EntryListRequest $request, ListAction $action): array
    {
        return $action($request->filters_json, $request->fields);
    }

    /**
     * 求人申込 登録
     *
     * @param EntryRequest $request
     * @param CreateAction $action
     * @return void
     */
    public function create(EntryRequest $request, CreateAction $action)
    {
        $action($request->all());
    }
}
