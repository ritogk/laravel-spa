<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GeneralsTableSeeder::class);
        $this->call(JobCategoriesTableSeeder::class);
        $this->call(JobTableSeeder::class);
    }
}
