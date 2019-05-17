<?php

use Illuminate\Database\Seeder;

class MusicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('musics')->insert([
            'name' => 'Mua',
            'lyric' => 'abc',
            'view' => 6,
            'path' => 'music/mua.mp3',
            'image' => 'image/7.png',
            'author' => 'Tinh Dinh Quang',
            'rating' => '4',
            'slug' => 'mua',
        ]);
        DB::table('musics')->insert([
            'name' => 'nang',
            'lyric' => 'abc',
            'view' => 6,
            'path' => 'music/mua.mp3',
            'image' => 'image/7.png',
            'author' => 'Tinh Dinh Quang',
            'rating' => '4',
            'slug' => 'nang',
        ]);
    }
}
