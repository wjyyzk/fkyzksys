<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Storage;
use App\StorageOut;

/**
 *  【テスト】出庫
 */
class StorageOutTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
	public function testRoute()
	{
        //  出庫入力フォーム
        $this->visit('/storage/out/create')
        	->seePageIs('/storage/out/create');
	}

    /**
    * 出庫テスト
    *
    * @return void
    */
    public function testAdd()
    {
        //  ログイン
        $this->getUser();

        //  テストデータを作成する
        $model = Storage::create([
            'hinban'            =>  str_random(10),
            'chikouguhinban'    =>  str_random(10)
        ]);
  
        $this->visit('/storage/out/create')
            ->type($model->id, 'id')
            ->type(10, 'stock')
            ->press('登録')
            ->see('データを登録しました。');

        $result = StorageOut::where('storage_id', '=', $model->id)->first();

        //  データベースを確認する
        if($result && $result->stock == 10)
            $this->assertTrue(true);
        else
            $this->assertTrue(false);
    }
}