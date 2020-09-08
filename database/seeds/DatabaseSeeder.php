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
        $this->call(DiscTableSeeder::class);
        $this->call(ArtistTableSeeder::class);
        $this->call(StyleTableSeeder::class);
    }
}
