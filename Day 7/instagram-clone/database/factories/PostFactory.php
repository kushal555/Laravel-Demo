<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'hashtag' => $faker->userName,
        'description'=> $faker->sentence,
        'image' => $faker->imageUrl(200,200)
    ];
});
