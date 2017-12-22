<?php

$factory->define(App\Patient::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "gender" => collect(["male","female",])->random(),
        "birthday" => $faker->date("Y-m-d", $max = 'now'),
        "guardians_name" => $faker->name,
        "contact_number" => $faker->name,
        "address" => $faker->name,
        "doctors_name" => $faker->name,
        "remarks" => $faker->name,
    ];
});
