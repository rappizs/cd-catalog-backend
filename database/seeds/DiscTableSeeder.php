<?php

use Illuminate\Database\Seeder;

class DiscTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Disc::class, 60)->create();
    }
}
