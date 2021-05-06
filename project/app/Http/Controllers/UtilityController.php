<?php

namespace App\Http\Controllers;

use App\Libs\Utility;
use Illuminate\Http\Request;
use App\Models\General;

class UtilityController extends Controller
{
    /**
     * テーブルの空カラムデータ取得
     *
     * @param  Request $request
     * @return array
     */
    public function getEmptyTableColumns(Request $request) :array
    {
        return Utility::getEmptyTableColumns($request->table_nm, $request->num);
    }
    
    /**
     * セレクト用のデータ取得
     *
     * @param  String $kbn
     * @return Array
     */
    public function selectData(string $kbn)
    {
        return General::getSelectData($kbn);
    }
}
