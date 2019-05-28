<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
            'name' => 'Son Tung',
            'description' => 'dep trai',
            'image' => 'bower_components/hoang-md-client/client/images/a3.png',
            'slug' => 'son-tung',
        ]);
        DB::table('artists')->insert([
            'name' => 'Huong Tram',
            'description' => 'hat hay',
            'image' => 'bower_components/hoang-md-client/client/images/a1.png',
            'slug' => 'huong-tram',
        ]);
        DB::table('artists')->insert([
            'name' => 'Tuan Hung',
            'description' => 'hat hay',
            'image' => 'bower_components/hoang-md-client/client/images/a2.png',
            'slug' => 'tuan-hung',
        ]);
    }
}
