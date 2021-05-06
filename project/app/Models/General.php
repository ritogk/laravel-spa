<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class General extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at']; // ブラックリスト

    /**
     * セレクト用のデータを取得
     *
     * @param string $kbn 区分
     */
    public static function getSelectData($kbn){
        $datas = General::where('kbn',  $kbn)
                        ->orderBy('sort_no')
                        ->select("code", "value")
                        ->get()
                        ->map(function ($row) {
                            return ['value' => $row->code, 'text' => $row->value];
                        });
         $datas->prepend(['value' =>'', 'text' => '']);
         return $datas;
    }

    /**
     * 連番更新
     *
     * @param string $kbn 区分
     * @return void
     */
    public static function sequenceUpdate(string $kbn){
        $general = General::where('kbn', $kbn)->lockForUpdate()->first();
        if(!is_numeric($general->value)){
            return;
        }
        $general->value = (int)$general->value + 1;
        $general->save();
    }

    /**
     * 連番取得
     *
     * @param string $kbn 区分
     * @return int 連番
     */
    public static function getSequence(string $kbn){
        return (int)General::where('kbn', $kbn)->lockForUpdate()->first()->value;
    }

    /**
    * 日時を日本時間に変換する
    * laravel7からtoArray, toJson内の日時がUTC固定になったので
    *
    * @param  \DateTimeInterface  $date
    * @return string
    */
   protected function serializeDate(DateTimeInterface $date)
   {
       return $date->format('Y-m-d H:i:s');
   }
}
