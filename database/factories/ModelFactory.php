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

//  ユーザーテーブル
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'username'          => $faker->name,
        'role'              => '管理者',
        'password'          => bcrypt('test'),
        'remember_token'    => str_random(10)
    ];
});

//  業者
$factory->define(App\Models\Merchant::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->word,
        'furigana'          => $faker->word
    ];
});

//  担当者
$factory->define(App\Models\PIC::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->word,
        'furigana'          => $faker->word
    ];
});

//  在庫テーブル
$factory->define(App\Models\Storage::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'hinban'            =>  $faker->word,
        'seppenfugou'       =>  $faker->word,
        'name'              =>  $faker->word,
        'tanaban'           =>  $faker->word,
        'af'                =>  $faker->boolean($changeOfGettingTrue = 50),
        'cf'                =>  $faker->boolean($changeOfGettingTrue = 50),
        'other'             =>  $faker->boolean($changeOfGettingTrue = 50),
        'chikouguhinban'    =>  $faker->word,
        'zuuban'            =>  $faker->word,
        'gyousha'           =>  $factory->create('App\Models\Merchant')->id,
        'unit_price'        =>  $faker->randomDigit,
        'shashu'            =>  $faker->word,
        'bui'               =>  $faker->word,
        'lock'              =>  $faker->word,
        'comment'           =>  $faker->word,
        'pic'               =>  $factory->create('App\Models\PIC')->id,
        'whq'               =>  $faker->randomDigit,
        'created_at'        =>  date("Y-m-d H:i:s"),
        'updated_at'        =>  date("Y-m-d H:i:s")
    ];
});

//  入庫テーブル
$factory->define(App\Models\StorageIn::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'storage_id'        =>  $factory->create('App\Models\Storage')->id,
        'date'              =>  date("Y-m-d"),
        'time'              =>  date("H:i:s"),
        'hinban_type'       =>  1,
        'stock'             =>  $faker->randomDigit
    ];
});

//  出庫テーブル
$factory->define(App\Models\StorageOut::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'storage_id'        =>  $factory->create('App\Models\Storage')->id,
        'date'              =>  date("Y-m-d"),
        'time'              =>  date("H:i:s"),
        'hinban_type'       =>  1,
        'stock'             =>  $faker->randomDigit
    ];
});