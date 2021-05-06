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
        DB::table('job_categories')->insert(['name' => '公務員', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => '営業', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => 'IT', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => '土方', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('job_categories')->insert(['name' => 'Youtuber', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
    }
}
