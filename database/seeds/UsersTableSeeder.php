<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \App\User::create([
            'name' => 'Yusuf Rizal H.',
            'username' => 'rizal',
            'password' => bcrypt('Pa$$w0rd'),
            'email' => 'rizal@gmail.com',
        ]);
    }
}
