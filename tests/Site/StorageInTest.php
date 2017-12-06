<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Storage;
use App\StorageIn;

/**
 *  【テスト】入庫
 */
class StorageInTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
    public function testRoute()
    {
        //  入庫入力フォーム
        $this->visit('/storage/in/create')
            ->seePageIs('/storage/in/create');
    }

    /**
    * 入庫テスト
    *
    * @return void
    */
    public function testAdd()
    {
        //  テストデータを作成する
        $model = factory(App\Storage::class)->create();
  
        $this->visit('/storage/in/create')
            ->type($model->id, 'id')
            ->type(100, 'stock')
            ->press('登録')
            ->see('データを登録しました。');

        $result = StorageIn::where('storage_id', '=', $model->id)->first();

        //  データベースを確認する
        if($result && $result->stock == 100)
            $this->assertTrue(true);
        else
            $this->assertTrue(false);
    }
}