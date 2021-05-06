<?php

namespace App\Repositories\Admin\Master;

use App\Models\General;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\Admin\Master\GeneralListRequest;
use App\Http\Requests\Admin\Master\GeneralRequest;

/**
 * インターフェース
 *
 */
interface GeneralRepositoryInterface {
    // 一覧取得
    public function getList(GeneralListRequest $request): Collection;
    // 登録
    public function createGeneral(GeneralRequest $request): void;
    // 削除
    public function deleteGeneral(string $id): void;
    // 更新
    public function updateGeneral(GeneralRequest $request, string $id): void;
    // １件取得
    public function getGeneral(string $id): General;
}