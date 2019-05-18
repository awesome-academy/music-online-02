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
            'name' => 'mưa',
            'image' => 'image/3.png',
            'slug' => 'mua',
        ]);
        DB::table('albums')->insert([
            'name' => 'mùa hè',
            'image' => 'image/4.png',
            'slug' => 'mua-he',
        ]);
    }
}
