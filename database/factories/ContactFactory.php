<?php

$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        "company_id" => factory('App\ContactCompany')->create(),
        "name" => $faker->name,
        "phone1" => $faker->name,
        "email" => $faker->name,
        "address" => $faker->name,
        "date" => $faker->date("Y-m-d H:i:s", $max = 'now'),
    ];
});
