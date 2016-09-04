<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'user_name' => $faker->word,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Fragment::class, function (Faker\Generator $faker) {
    return [
        'content'          => $faker->paragraph,
        'fragment_type_id' => $faker->randomDigitNotNull,
        'fragment_type'    => $faker->randomDigitNotNull,
        'order'            => $faker->randomDigitNotNull
    ];
});

$factory->define(App\Story::class, function (Faker\Generator $faker) {
    return [
        'title'         => $faker->text(140),
        'synopsis'      => $faker->paragraph,
        'story_type_id' => $faker->randomDigitNotNull,
    ];
});
