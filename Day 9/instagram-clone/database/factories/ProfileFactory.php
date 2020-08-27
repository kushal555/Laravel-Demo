<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'about_me'=> $faker->sentence,
        'website' => $faker->url,
        'profile_pic_url' => $faker->imageUrl(150,150)
    ];
});
