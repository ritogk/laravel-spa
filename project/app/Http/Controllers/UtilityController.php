<?php

namespace App\Http\Controllers;

use App\Libs\Utility;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    /**
     * テーブルの空カラム一覧
     *
     * @param  Request $request
     * @return array
     */
    public function emptyTableColumns(Request $request) :array
    {
        return Utility::getEmptyTableColumns($request->table_nm, $request->num);
    }
}
