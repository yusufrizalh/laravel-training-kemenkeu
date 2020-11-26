<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = collect(['Settings', 'Code', 'Help', 'Users', 'Foundation']);
        $tags->each(function ($c) {
            \App\Tag::create([
                'name' => $c,
                'slug' => \Str::slug($c),
            ]);
        });
    }
}
