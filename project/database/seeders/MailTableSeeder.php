<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('mails')->insert(['subject' => 'テストタイトル', 'message' => 'テストテストテストテストテストテストテスト', 'updated_at' => $now, 'created_at' => $now]);
    }
}
