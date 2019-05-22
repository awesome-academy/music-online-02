<?php

use Illuminate\Database\Seeder;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'name' => 'Mưa',
            'image' => 'bower_components/hoang-md-client/client/images/a2.png',
            'slug' => 'mua',
        ]);
        DB::table('albums')->insert([
            'name' => 'Nắng',
            'image' => 'bower_components/hoang-md-client/client/images/a3.png',
            'slug' => 'nang',
        ]);
        DB::table('albums')->insert([
            'name' => 'Gió mùa',
            'image' => 'bower_components/hoang-md-client/client/images/a4.png',
            'slug' => 'gio-mua',
        ]);
        DB::table('albums')->insert([
            'name' => 'Gió Lào',
            'image' => 'bower_components/hoang-md-client/client/images/a5.png',
            'slug' => 'gio-lao',
        ]);
    }
}
