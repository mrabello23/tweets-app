<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweet;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        'tweet' => $faker->paragraph(1),
        'tweet_data' => date('Y-m-d H:i:s'),
        'hashtag' => '#' . $faker->sentence(),
        'seguidores' => $faker->randomNumber(3),
        'localidade' => 'Los Angeles, CA',
        'lingua' => 'en',
        'usuario_nome' => $faker->name(),
        'usuario_apelido' => 'fakeruser'
    ];
});
