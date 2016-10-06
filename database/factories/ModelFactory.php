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

//	ユーザーテーブル
$factory->define(App\User::class, function (Faker\Generator $faker) {
	return [
		'username'			=> $faker->name,
		'password'			=> bcrypt('test'),
		'remember_token' 	=> str_random(10)
	];
});

//	在庫テーブル
$factory->define(App\Storage::class, function (Faker\Generator $faker) {
	return [
		'hinban'			=>	$faker->word,
		'seppenfugou'		=>	$faker->word,
		'name'				=>	$faker->word,
		'tanaban'			=>	$faker->word,
		'af'				=>	$faker->boolean($changeOfGettingTrue = 50),
		'cf'				=>	$faker->boolean($changeOfGettingTrue = 50),
		'other'				=>	$faker->boolean($changeOfGettingTrue = 50),
		'chikouguhinban'	=>	$faker->word,
		'zuuban'			=>	$faker->word,
		'gyousha'			=>	$faker->word,
		'unit_price'		=>	$faker->randomDigit,
		'shashu'			=>	$faker->word,
		'bui'				=>	$faker->word,
		'lock'				=>	$faker->word,
		'comment'			=>	$faker->word,
		'pic'				=>	$faker->lastName,
		'whq'				=>	$faker->randomDigit,
		'created_at'		=>	date("Y-m-d H:i:s"),
		'updated_at'		=>	date("Y-m-d H:i:s")
	];
});

//	入庫テーブル
$factory->define(App\StorageIn::class, function (Faker\Generator $faker) {
	return [
		'storage_id'		=>	$faker->randomDigit,
		'date'				=>	date("Y-m-d"),
		'time'				=>	date("H:i:s"),
		'stock'				=>	$faker->randomDigit
	];
});

//	出庫テーブル
$factory->define(App\StorageOut::class, function (Faker\Generator $faker) {
	return [
		'storage_id'		=>	$faker->randomDigit,	
		'date'				=>	date("Y-m-d"),
		'time'				=>	date("H:i:s"),
		'stock'				=>	$faker->randomDigit
	];
});