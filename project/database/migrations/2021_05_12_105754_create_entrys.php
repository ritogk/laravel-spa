<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrys', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->comment('氏名');
            $table->text('motivation')->comment('志望動機');
            $table->text('self_pr')->comment('自己PR');
            $table->string('tel')->comment('電話番号');
            $table->string('email', 256)->comment('メールアドレス');
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
        Schema::dropIfExists('entrys');
    }
}
