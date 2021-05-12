<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->comment('タイトル');
            $table->text('content')->comment('内容');
            $table->boolean('attention')->comment('注目の求人');
            $table->integer('job_category_id')->comment('仕事カテゴリID');
            $table->bigInteger('price')->comment('金額');
            $table->string('image')->comment('画像パス');
            $table->integer('sort_no')->comment('並び順');
            $table->timestamps();
            $table->softDeletes()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
