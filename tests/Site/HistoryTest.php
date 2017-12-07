<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 *  【テスト】履歴
 */
class HistoryTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
    public function testRoute()
    {
        //  履歴
        $this->visit('/history')
            ->seePageIs('/history');
    }

    /**
     * 在庫履歴の検索テスト
     *
     * @return void
     */
    public function testSearchHistory()
    {
        $model = factory(App\Models\StorageIn::class)->create();

        if($model)
        {
            //  品番
            $this->visit('/storage/index')
                ->type($model->hinban, 'sHinban')
                ->press('検索')
                ->see($model->chikouguhinban);

            //  治工具品番
            $this->visit('/storage/index')
                ->type($model->chikouguhinban, 'sHinban')
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