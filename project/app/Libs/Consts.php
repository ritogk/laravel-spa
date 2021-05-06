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

    // kbn = '公共交通機関'
    const koutukikan = array('徒歩' => 1
                            , '路線バス' => 2
                            , 'タクシー' => 3
                            , '自転車・バイク' => 4);
    // kbn = '移動方法'
    const move = array('公共交通機関' => 1
                    , '鉄道からシャトルバス' => 2
                    , '指定駐車場からシャトルバス' => 3
                    , '自家用車' => 4);
    // kbn = '性別'
    const sex = array('男' => 1
                    , '女' => 2);

    // kbn = '都道府県コード'
    const prefectures = array('北海道' => '01'
                                , '青森県' => '02'
                                , '岩手県' => '03'
                                , '宮城県' => '04'
                                , '秋田県' => '05'
                                , '山形県' => '06'
                                , '福島県' => '07'
                                , '茨城県' => '08'
                                , '栃木県' => '09'
                                , '群馬県' => '10'
                                , '埼玉県' => '11'
                                , '千葉県' => '12'
                                , '東京都' => '13'
                                , '神奈川県' => '14'
                                , '新潟県' => '15'
                                , '富山県' => '16'
                                , '石川県' => '17'
                                , '福井県' => '18'
                                , '山梨県' => '19'
                                , '長野県' => '20'
                                , '岐阜県' => '21'
                                , '静岡県' => '22'
                                , '愛知県' => '23'
                                , '三重県' => '24'
                                , '滋賀県' => '25'
                                , '京都府' => '26'
                                , '大阪府' => '27'
                                , '兵庫県' => '28'
                                , '奈良県' => '29'
                                , '和歌山県' => '30'
                                , '鳥取県' => '31'
                                , '島根県' => '32'
                                , '岡山県' => '33'
                                , '広島県' => '34'
                                , '山口県' => '35'
                                , '徳島県' => '36'
                                , '香川県' => '37'
                                , '愛媛県' => '38'
                                , '高知県' => '39'
                                , '福岡県' => '40'
                                , '佐賀県' => '41'
                                , '長崎県' => '42'
                                , '熊本県' => '43'
                                , '大分県' => '44'
                                , '宮崎県' => '45'
                                , '鹿児島県' => '46'
                                , '沖縄県' => '47');
}
