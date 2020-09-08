<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $styles = ["Rock", "POP", "Metal", "Dance", "Techno", "Rap"];

        foreach ($styles as $name) {
            DB::table('styles')->insert([
                'id' => Str::uuid(),
                'name' => $name
            ]);
        }
    }
}
