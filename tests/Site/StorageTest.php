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
        $model = factory(App\Models\Storage::class)->create();

        if($model)
        {
            //  品番
            $this->visit('/storage/index')
                ->type($model->hinban, 'sHinban')
                ->press('検索')
                ->see($model->chikouguhinban);

            //  治工具品番
            $this->visit('/storage/index')
                ->type($model->chikouguhinban, 'sChikouguhinban')
                ->press('検索')
                ->see($model->hinban);

            //  リセット
            $this->visit('/storage/index')
                ->click("#reset")
                ->seePageIs('/storage/index');            
        }
        else
        {
            $this->markTestIncomplete('テストが出来ません。');
        }
    }
}