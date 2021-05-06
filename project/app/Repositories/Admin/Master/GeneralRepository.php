<?php

namespace App\Repositories\Admin\Master;

use App\Models\General;
use Illuminate\Database\Eloquent\Collection;

/**
 * リポジトリクラス
 *
 */
class GeneralRepository {
    // 一覧取得
    public function getList(array $filters): Collection{
        return General::where($filters)
                        ->where('changeable', 1)
                        ->orderBy('kbn')
                        ->orderBy('sort_no')
                        ->get();
    }
    
    // 登録
    public function create(array $general): void{
        $code_max = General::withTrashed()->where('kbn', $general['kbn'])->max('code');
        $general['code'] = $code_max ? (int)$code_max + 1 : 1;
        General::create($general);
    }
    
    // 削除
    public function delete(string $id): void{
        General::where('id', $id)->delete();
    }
    
    // 更新
    public function update(array $general, string $id): void{
        $update = [
            'kbn' => $general['kbn'],
            'value' => $general['value'],
            'sort_no' => $general['sort_no']
        ];
        General::where('id', $id)->update($update);
    }
    
    // １件取得
    public function find(string $id): General{
        return General::find($id);
    }
}
