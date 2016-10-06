<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  ユーザーデータ
        $this->call(UsersTableSeeder::class);

        //  在庫データ
        factory(App\Storage::class, 50)->create()
            ->each(function ($u)
            {
                $u->storage_in()->saveMany(factory(App\StorageIn::class, 2)->make());
            })
            ->each(function ($u)
            {
                $u->storage_out()->saveMany(factory(App\StorageOut::class, 2)->make());
            });
    }
}
