<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DateTimeInterface;

class JobCategory extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at']; // ブラックリスト

    // リレーション
    public function job()
    {
        return $this->hasMany('App\Models\Job');
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
