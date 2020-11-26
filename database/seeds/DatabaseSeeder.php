<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
