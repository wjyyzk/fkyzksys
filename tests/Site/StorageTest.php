<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 *  【テスト】在庫リスト
 */
class StorageTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
    public function testRoute()
    {
        //  在庫一覧
        $this->visit('/storage/index')
            ->seePageIs('/storage/index');
    }

    /**
     * 在庫リストの検索テスト
     *
     * @return void
     */
    public function testSearchStorage()
    {
        $model = factory(App\Storage::class)->make();

        if($model)
        {
            $this->visit('/storage/index')
                ->type($model->hinban, 'sHinban')
                ->press('検索')
                ->see($model->hinban)
                ->click("#reset")
                ->seePageIs('/storage/index');            
        }
        else
        {
            $this->markTestIncomplete('テストが出来ません。');
        }
    }
}