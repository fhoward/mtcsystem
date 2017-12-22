<?php

$factory->define(App\Schedule::class, function (Faker\Generator $faker) {
    return [
        "staff_id" => factory('App\User')->create(),
        "patient_id" => factory('App\Patient')->create(),
        "activity" => $faker->name,
        "status" => collect(["present","absent",])->random(),
        "date" => $faker->date("Y-m-d", $max = 'now'),
        "start" => $faker->date("H:i:s", $max = 'now'),
        "end" => $faker->date("H:i:s", $max = 'now'),
    ];
});
