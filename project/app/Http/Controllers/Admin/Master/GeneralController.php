<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\General;
use App\Http\Requests\Admin\Master\GeneralListRequest;
use App\Http\Requests\Admin\Master\GeneralRequest;
use App\Services\Admin\Master\GeneralService;

class GeneralController extends Controller
{
    private $service;
    public function __construct(GeneralService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  GeneralListRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(GeneralListRequest $request)
    {
        return $this->service->getList($request->filters());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GeneralRequest $request
     * @return void
     */
    public function store(GeneralRequest $request)
    {
        $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return General
     */
    public function show($id)
    {
        return $this->service->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GeneralRequest $request
     * @param  string $id
     * @return void
     */
    public function update(GeneralRequest $request, $id)
    {
        $this->service->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $id
     * @return void
     */
    public function destroy($id)
    {
        $this->service->delete($id);
    }

    /**
     * 入力条件取得
     *
     * @param  Request $request
     * @return array
     */
    public function getConds(Request $request) : array
    {
        return $this->service->getCondSession($request->all());
    }

    /**
     * 入力条件セット
     *
     * @param  GeneralListRequest $request
     * @return void
     */
    public function setConds(GeneralListRequest $request) : void
    {
        $this->service->setCondSession($request);
    }

    /**
     * excel出力
     *
     * @return \Illuminate\Http\Response
     */
    public function exportExcel() {
        return $this->service->exportExcel();
    }
}
