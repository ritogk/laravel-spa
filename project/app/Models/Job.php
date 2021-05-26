<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at']; // ブラックリスト

    // リレーション
    public function jobCategories()
    {
        return $this->belongsTo('App\Models\JobCategory');
    }

    // リレーション
    public function entries()
    {
        return $this->hasMany('App\Models\Entry');
    }
}
