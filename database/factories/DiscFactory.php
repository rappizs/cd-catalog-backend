<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Disc;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Disc::class, function (Faker $faker) {
    $artists = ["ABBA", "AC/DC", "David Guetta", "Bruno Mars", "Akon", "Beyonce", "Big Sean", "Black Sabbath", "Metallica"];
    $styles = ["Rock", "POP", "Metal", "Dance", "Techno", "Rap"];

    return [
        'id' => Str::uuid(),
        'title' => "CD-" . Str::random(10),
        'artist' => $artists[array_rand($artists)],
        'album' => Str::random(10),
        'year' => $faker->numberBetween(1970, 2020),
        'style' => $styles[array_rand($styles)],
        'song_count' => $faker->numberBetween(5, 20),
    ];
});
