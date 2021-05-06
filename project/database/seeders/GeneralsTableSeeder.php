<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\General;

class GeneralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        // General::factory()->count(5)->create();
        DB::table('generals')->insert(['kbn' => '受付番号(シーケンス番号)', 'code' => '1', 'value' => '50000', 'sort_no' => 1, 'changeable' => 1, 'updated_at' => $now, 'created_at' => $now]);
    }
}
