<?php

use Illuminate\Database\Seeder;

class PlaylistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('playlists')->insert([
            'name' => 'playlist1',
            'user_id' => 1,
            'image' => 'image/9.png',
            'slug' => 'playlist1',
        ]);
        DB::table('playlists')->insert([
            'name' => 'playlist2',
            'user_id' => 1,
            'image' => 'image/9.png',
            'slug' => 'playlist2',
        ]);
    }
}
