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

/*
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
*/

$factory->define(App\Storage::class, function (Faker\Generator $faker) {
	return [
		'hinban1'			=>	$faker->word,
		'search_hinban'		=>	$faker->word,
		'seppenfugou'		=>	$faker->word,
		'name'				=>	$faker->word,
		'ac'				=>	$faker->boolean($changeOfGettingTrue = 50),
		'cf'				=>	$faker->boolean($changeOfGettingTrue = 50),
		'other'				=>	$faker->boolean($changeOfGettingTrue = 50),
		'hinban2'			=>	$faker->word,
		'zuuban'			=>	$faker->word,
		'gyousha'			=>	$faker->word,
		'unit_price'		=>	$faker->randomDigit,
		'stock_curr'		=>	$faker->randomDigit,
		'stock_prev'		=>	$faker->randomDigit,
		'shiyougaki'		=>	$faker->word,
		'shashu'			=>	$faker->word,
		'bui'				=>	$faker->word,
		'lock'				=>	$faker->word,
		'comment'			=>	$faker->word,
		'pic'				=>	$faker->lastName
	];
});