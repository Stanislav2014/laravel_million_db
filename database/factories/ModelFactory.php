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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween($min = 1, $max = 100),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {

    return [
        'author_id' => $faker->numberBetween($min = 1, $max = 10),
        'title' => $faker->word(),
        'body' => $faker->text(200),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    return [
        'author_id' => $faker->numberBetween($min = 1, $max = 10),
        'article_id' => $faker->numberBetween($min = 1, $max = 10),
        'body' => $faker->text(50),
    ];
});

