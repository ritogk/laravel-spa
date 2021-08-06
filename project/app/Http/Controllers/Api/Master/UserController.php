<?php

namespace App\Http\Controllers\Api\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\UserListRequest;

// usecase
use App\UseCases\Master\User\ListAction;

class UserController extends Controller
{
    /**
     * 一覧取得
     *
     * @param  UserListRequest $request
     * @param  ListAction $action
     * @return array
     */
    public function index(UserListRequest $request, ListAction $action): array
    {
        return $action($request->filters_json, $request->fields);
    }
}
