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
        DB::table('job_categories')->insert(['name' => '公務員', 'content' => '役所、消防署、官僚、国税専門官、財務専門官、自衛隊', 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => '営業', 'content' => 'コンサルティングファーム、監査法人、専門事務所', 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => 'IT', 'content' => 'アプリ開発、インフラ、ITコンサルタント、社内SE、ヘルプデスク、データサイエンティスト', 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => '土方', 'content' => '建築／土木／不動産／プラント／設備', 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => 'Youtuber', 'content' => 'リサーチ、審査/査定', 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
    }
}
