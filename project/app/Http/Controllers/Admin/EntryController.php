<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EntryListRequest;

// usecase
use App\UseCases\Admin\Entry\ListAction;
use App\UseCases\Admin\Entry\FindAction;
use App\UseCases\Admin\Entry\SetCondAction;
use App\UseCases\Admin\Entry\GetCondAction;


class EntryController extends Controller
{
    /**
     * 一覧取得
     *
     * @param  EntryListRequest $request
     * @param  ListAction $action
     * @return array
     */
    public function list(EntryListRequest $request, ListAction $action): array
    {
        return $action($request->filters());
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
     * @param  EntryListRequest $request
     * @param  SetCondAction $action
     * @return void
     */
    public function setConds(EntryListRequest $request, SetCondAction $action) : void
    {
        $action($request->all());
    }
}
