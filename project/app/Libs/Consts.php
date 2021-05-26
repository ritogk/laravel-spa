<?php
namespace App\Libs;
use Illuminate\Support\Facades\Log;

// 汎用マスタコード管理クラス
class Consts
{
    //定数を配列で取得する
    public static function getConstants() {
        $oClass = new \ReflectionClass( __CLASS__ );
        return $oClass->getConstants();
    }

    //定数を配列で取得する
    public static function getFlipConstants() {
        $oClass = new \ReflectionClass( __CLASS__ );
        return array_map(function( $value ){
                    return array_flip($value);
                }, $oClass->getConstants());
    }

    // バリュー値取得
    public static function getValue(string $name, string $code) {
        $oClass = new \ReflectionClass( __CLASS__ );
        return array_map(function( $value ){
            return array_flip($value);
        }, $oClass->getConstants())[$name][$code];
    }

    // キーと値を反転した値を取得
    public static function getFlip($name){
        $oClass = new \ReflectionClass( __CLASS__ );
        return array_flip($oClass->getConstant($name));
    }

    // 福利厚生
    const welfare = array('社保完備' => 1
                        ,'引越し支援' => 2
                        ,'書籍購入制度' => 3
                        ,'産休育休制度' => 4
                        ,'結婚祝金' => 5);
    // 休日
    const holiday = array('土日祝' => 1
                        , '年末年始' => 2
                        , '夏期' => 3
                        , '有給' => 4
                        , '結婚休暇' => 5
                        , '誕生月休暇' => 6);
}
