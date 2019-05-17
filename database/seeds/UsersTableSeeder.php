<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin1',
            'password' => bcrypt('123456'),
            'email' => 'manhhoang291196@gmail.com',
            'role_id' => 1,
            'image' => 'image/1.png',
        ]);
        DB::table('users')->insert([
            'name' => 'client1',
            'password' => bcrypt('123456'),
            'email' => 'manh291196@gmail.com',
            'role_id' => 2,
            'image' => 'image/2.png',
        ]);
    }
}
