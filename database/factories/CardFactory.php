<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

// CREATE dummy card data
$factory->define(App\Card::class, function (Faker $faker) {

    return [
        'task'          => $faker->paragraph, 
        'description'   => $faker->sentence, 
        'importance'    => 'high',
        'deadline'      => $faker->date,
        'user_id'       => function() {
            return factory(\App\User::class)->create()->id;
        }
    ];
});