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
            'username'         =>  'admin',
            'password'         =>  bcrypt('admin'),
            'created_at'       =>  $currDate,
            'updated_at'       =>  $currDate
        ]);

        DB::table('users')->insert([
            'username'         =>  'takaoka',
            'password'         =>  bcrypt('takaoka'),
            'created_at'       =>  $currDate,
            'updated_at'       =>  $currDate
        ]);
    }
}
