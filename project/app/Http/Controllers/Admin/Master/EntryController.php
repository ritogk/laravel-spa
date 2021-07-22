<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EntryListRequest;
use App\Http\Requests\Admin\Master\EntryRequest;

// usecase
use App\UseCases\Admin\Master\Entry\ListAction;
use App\UseCases\Admin\Master\Entry\CreateAction;

class EntryController extends Controller
{
    /**
     * 一覧取得
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
     * 登録
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
