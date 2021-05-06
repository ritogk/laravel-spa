<?php
namespace App\Libs;

use Illuminate\Support\Facades\Schema;

// 共通クラス
//
// よく使われる関数を書く
//
class Utility {
    /**
     * テーブルの空カラムデータ取得
     *
     * @param  String $table_nm テーブル名
     * @param  integer $num 数
     * @return array
     */
    public static function getEmptyTableColumns($table_nm, $num) :array
    {
        $columns = Schema::getColumnListing($table_nm);
        $emptyData = array();
        foreach($columns as $column){
            $emptyData[$column] = "";
        }

        $rtnArray = array();
        if($num > 1){
            for($i = 0; $i < $num; $i++){
                $rtnArray[] = $emptyData;
            }
        }else{
            $rtnArray = $emptyData;
        }
        return $rtnArray;
    }
}
