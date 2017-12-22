<?php

$factory->define(App\Profession::class, function (Faker\Generator $faker) {
    return [
        "profession" => $faker->name,
    ];
});
