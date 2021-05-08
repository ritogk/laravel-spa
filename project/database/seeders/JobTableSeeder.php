<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('jobs')->insert(['title' => '教員募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 1, 'price' => 5000000, 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 1, 'price' => 5000000, 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '公務員募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 1, 'price' => 5000000, 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '建築士募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 1, 'price' => 5000000, 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '消防士募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 1, 'price' => 5000000, 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'コンビニ店長募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 1, 'price' => 5000000, 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'スーパー店長募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 1, 'price' => 5000000, 'image' => 'https://reffect.co.jp/wp-content/uploads/2020/08/vue_preview_image-1024x730.png', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
    }
}
