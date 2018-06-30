<?php

use Faker\Generator as Faker;

$factory->define(App\Gym_users::class, function (Faker $faker) {
    return [
        //
        'name' =>$faker->name,
        'email' =>$faker->email,
        'password' =>$faker->password,
        'user_id' => App\User::all()->random()->id

    ];
});
