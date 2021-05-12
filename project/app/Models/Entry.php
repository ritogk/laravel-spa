<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entry extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at']; // ブラックリスト
}
