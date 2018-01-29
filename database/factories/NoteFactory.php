<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Note::class, function (Faker $faker) {
    return [
        'title' => $faker->name(),
        'note' => $faker->text(),
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
    ];
});
