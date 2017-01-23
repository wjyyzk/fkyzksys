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

        //  業者
        $this->call(MerchantsTableSeeder::class);

        //  担当者
        $this->call(PICTableSeeder::class);

        //  在庫データ
        /*  テスト用
        factory(App\Storage::class, 10)->create()
            ->each(function ($u)
            {
                $u->storage_in()->saveMany(factory(App\StorageIn::class, 2)->make());
            })
            ->each(function ($u)
            {
                $u->storage_out()->save(factory(App\StorageOut::class)->make());
            });
        */
    }
}
