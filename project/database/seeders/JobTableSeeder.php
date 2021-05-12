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
        DB::table('jobs')->insert(['title' => '教員募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 1, 'price' => 300000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/150415532410_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 800000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/ookawa9thPAR56458_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 700000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/PK4131309PAR58125_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 600000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/PKU4151352PAR58369_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 500000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/fujiko0328_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 400000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/macbook1682_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 800000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/macbook1995_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 400000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/YOTA93_ippon15134025_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 500000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/watchFTHG1313_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 600000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/iphonexrFTHG8914_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 700000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/MS458A2817_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 500000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/ADIMGL6708_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 600000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/CAT9V9A9181_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'エンジニア募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 3, 'price' => 700000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/RMIMGL2653_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '公務員募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 1, 'price' => 700000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/kankoucyou1541_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '建築士募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 4, 'price' => 700000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/PASONA_3_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '消防士募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 1, 'price' => 700000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/KAI428034_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'コンビニ店長募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 5, 'price' => 1300000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/YUKItaiwan_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'スーパー店長募集!!', 'content' => '簡単なお仕事!', 'attention' => true, 'job_category_id'=> 5, 'price' => 2000000, 'image' => 'https://www.pakutaso.com/shared/img/thumb/hawaiiDSC00241_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
    }
}
