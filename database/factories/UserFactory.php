<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        "emp_id" => $faker->name,
        "name" => $faker->name,
        "email" => $faker->safeEmail,
        "password" => str_random(10),
        "confirm_password" => $faker->name,
        "rfid_no" => $faker->name,
        "role_id" => factory('App\Role')->create(),
        "remember_token" => $faker->name,
        "gender" => collect(["male","female",])->random(),
        "contact_no" => $faker->name,
        "profession_id" => factory('App\Profession')->create(),
        "prc_number" => $faker->name,
        "sss_id" => $faker->name,
        "tin_no" => $faker->name,
        "philhealth_id" => $faker->name,
        "guardian_name" => $faker->name,
        "guardian_contact_no" => $faker->name,
        "guardian_address" => $faker->name,
    ];
});
