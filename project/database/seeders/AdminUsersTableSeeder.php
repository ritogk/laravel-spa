<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('admin_users')->insert([
            'name' => 'test',
            'email' => 'test@test.co.jp',
            'password' => bcrypt('test'),
            'updated_at' => $now,
            'created_at' => $now
        ]);
    }
}
