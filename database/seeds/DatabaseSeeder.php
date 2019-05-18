<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(ArtistsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(MusicsTableSeeder::class);
        $this->call(PlaylistsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
    }
}
