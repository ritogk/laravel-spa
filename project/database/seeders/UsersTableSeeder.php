<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@rito.co.jp',
            'password' => bcrypt('root'),
            'updated_at' => $now,
            'created_at' => $now
        ]);

        DB::table('users')->insert([
            'name' => 'normal',
            'email' => 'normal@normal.co.jp',
            'password' => bcrypt('normal'),
            'updated_at' => $now,
            'created_at' => $now
        ]);

        User::factory()->count(5)->create();
    }
}
