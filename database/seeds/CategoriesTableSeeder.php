<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = collect(['Framework', 'Laravel', 'CodeIgniter', 'Slim', 'CakePHP']);
        $categories->each(function ($c) {
            \App\Category::create([
                'name' => $c,
                'slug' => \Str::slug($c),
            ]);
        });
    }
}
