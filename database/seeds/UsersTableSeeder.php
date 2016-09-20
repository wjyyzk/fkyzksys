<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currDate = date("Y-m-d");

        DB::table('users')->insert([
            'name'             =>  'admin',
            'password'         =>  'admin',
            'created_at'       =>  $currDate,
            'updated_at'       =>  $currDate
        ]);

        DB::table('users')->insert([
            'name'             =>  'takaoka',
            'password'         =>  'takaoka',
            'created_at'       =>  $currDate,
            'updated_at'       =>  $currDate
        ]);
    }
}
