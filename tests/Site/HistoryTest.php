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
            $this->visit('/history')
                ->type($model->hinban, 'sHinban')
                ->press('検索')
                ->see($model->chikouguhinban);

            //  治工具品番
            $this->visit('/history')
                ->type($model->chikouguhinban, 'sHinban')
                ->press('検索')
                ->see($model->hinban);

            //  開始日付
            $this->visit('/history')
                ->type($model->date, 'sStartDate')
                ->press('検索')
                ->see($model->hinban);

            //  終了日付
            $this->visit('/history')
                ->type($model->date, 'sEndDate')
                ->press('検索')
                ->see($model->hinban);

            //  状態
            $this->visit('/history')
                ->select($model->hinban_type, 'sHinbanType')
                ->press('検索')
                ->see($model->hinban);

            //  入出庫
            $this->visit('/history')
                ->select(1, 'sType')
                ->press('検索')
                ->see($model->hinban);

            //  リセット
            $this->visit('/history')
                ->click("#reset")
                ->seePageIs('/history');
        }
        else
        {
            $this->markTestIncomplete('テストが出来ません。');
        }
    }
}