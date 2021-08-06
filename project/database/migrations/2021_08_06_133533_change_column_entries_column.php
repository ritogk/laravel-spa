<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnEntriesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('self_pr');
            $table->dropColumn('tel');
            $table->dropColumn('email');
            $table->integer('user_id')->after('job_id')->comment('会員ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->string('full_name')->after('job_id')->comment('氏名');
            $table->text('self_pr')->after('full_name')->comment('自己PR');
            $table->string('tel')->after('self_pr')->comment('電話番号');
            $table->string('email', 256)->after('tel')->comment('メールアドレス');
            $table->dropColumn('user_id');
        });
    }
}
