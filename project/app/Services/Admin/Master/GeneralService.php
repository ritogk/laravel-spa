<?php

namespace App\Services\Admin\Master;

use Illuminate\Http\Request;
use App\Models\General;
use App\Http\Requests\Admin\Master\GeneralListRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Excel\Exports\GeneralsExport;
use App\Repositories\Admin\Master\GeneralRepository;

/**
 * サービスクラス
 *
 */
class GeneralService {
    private $repository;
    public function __construct(GeneralRepository $repository){
        $this->repository = $repository;
    }
    
    // 一覧取得
    public function getList(array $filters): array{
        return $this->repository->getList($filters)->toArray();
    }
    
    // 登録
    public function create(array $general): void{
        $this->repository->create($general);
    }
    
    // 削除
    public function delete(string $id): void{
        $this->repository->delete($id);
    }
    
    // 更新
    public function update(array $general, string $id): void{
        $this->repository->update($general, $id);
    }
    
    // １件取得
    public function find(string $id): General{
        return $this->repository->find($id);
    }
    
    // 条件セッション取得
    public function getCondSession(array $conds): array{
        return GeneralListRequest::getRequestSession($conds);
    }
    
    // 条件セッションセット
    public function setCondSession(Request $request): void{
        GeneralListRequest::setRequestSession($request);
    }
    
    // excel出力
    public function exportExcel(){
        return Excel::download(new GeneralsExport, 'generals.xlsx');
    }
}
