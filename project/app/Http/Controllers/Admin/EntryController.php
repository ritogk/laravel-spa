<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EntryListRequest;

// usecase
use App\UseCases\Admin\Entry\ListAction;

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
        return $action($request);
    }
}
