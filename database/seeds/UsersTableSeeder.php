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
        DB::table('users')->insert([
        	'user'		=>	'admin',
        	'password'	=>	'admin'
        ]);

        DB::table('users')->insert([
            'user'      =>  'takaoka',
            'password'  =>  'takaoka'
        ]);
    }
}
