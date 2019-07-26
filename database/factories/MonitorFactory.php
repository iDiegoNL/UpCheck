<?php

use Faker\Generator as Faker;

$factory->define(App\Monitor::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->word,
        'monitor_type' => 1,
        'domain' => $faker->freeEmailDomain,
        'interval' => 5,
        'category' => $faker->word,
    ];
});
