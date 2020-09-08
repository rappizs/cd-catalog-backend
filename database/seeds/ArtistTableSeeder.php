<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artists = ["ABBA", "AC/DC", "David Guetta", "Bruno Mars", "Akon", "Beyonce", "Big Sean", "Black Sabbath", "Metallica"];

        foreach ($artists as $name) {
            DB::table('artists')->insert([
                'id' => Str::uuid(),
                'name' => $name
            ]);
        }
    }
}
