<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JobCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('job_categories')->insert(['name' => '公務員', 'content' => '役所、消防署、官僚、国税専門官、財務専門官、自衛隊', 'image' => 'public/images/PAKSdwe84_TP_V4.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => '営業', 'content' => 'コンサルティングファーム、監査法人、専門事務所', 'image' => 'public/images/kusaiyoIMGL7225_TP_V.jpg', 'sort_no' => 2, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => 'IT', 'content' => 'アプリ開発、インフラ、ITコンサルタント、社内SE、ヘルプデスク、データサイエンティスト', 'image' => 'public/images/macbook1696_TP_V.jpg', 'sort_no' => 3, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => '家', 'content' => '建築／土木／不動産／プラント／設備', 'image' => 'public/images/MIYA19224DSC_7993_TP_V.jpg', 'sort_no' => 4, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => '小売店', 'content' => 'スーパー/コンビニ', 'image' => 'public/images/hawaiiDSC00241_TP_V.jpg', 'sort_no' => 5, 'updated_at' => $now, 'created_at' => $now]);
    }
}
