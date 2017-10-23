<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Storage;

/**
 *  【テスト】在庫リスト
 */
class AdminStorageTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
    public function testRoute()
    {
        //  【管理画面】在庫リスト
        $this->visit('/admin/storage/index')
            ->seePageIs('/login');

        //	ログイン
        $this->getUser();

        //  在庫リスト
        $this->visit('/admin/storage/index')
            ->seePageIs('/admin/storage/index');

        $this->visit('/admin/storage/create')
            ->seePageIs('/admin/storage/create');
    }

    /**
     * 在庫リストの登録ﾃｽﾄ
     *
     * @return void
     */
    public function testNewStorage()
    {
        //  ログイン
        $this->getUser();

        $mockdata = array(
            'hinban'            =>  str_random(10),
            'chikouguhinban'    =>  str_random(10)
        );

        $this->visit('/admin/storage/create')
            ->type($mockdata['hinban'], 'hinban')
            ->type($mockdata['chikouguhinban'], 'chikouguhinban')
            ->press('登録')
            ->seePageIs('/admin/storage/index')
            ->see('データを作成しました。');

        $this->seeInDatabase('storage', ['hinban' => $mockdata['hinban']]);
    }

    /**
     * 在庫リストの検索テスト
     *
     * @return void
     */
    public function testSearchStorage()
    {
        //  ログイン
        $this->getUser();

        $model = Storage::orderBy('id', 'desc')->first();

        $this->visit('/admin/storage/index')
            ->type($model->hinban, 'sHinban')
            ->press('検索')
            ->seePageIs('/admin/storage/index?sChikouguhinban=&sGyousha=0&sHinban='.$model->hinban.'&sName=&sOrder=hinban&sShashu=&search=search')
            ->see($model->hinban)
            ->click("#reset")
            ->seePageIs('/admin/storage/index');
    }

    /**
     * 在庫リストの更新テスト
     *
     * @return void
     */
    public function testUpdateStorage()
    {
        //  ログイン
        $this->getUser();

        $model = Storage::orderBy('id', 'desc')->first();

        $mockdata = str_random(10);

        //  データを更新する
        $this->visit('/admin/storage/'.$model->id.'/edit')
            ->type($mockdata, 'chikouguhinban')
            ->press('登録');

        $this->seeInDatabase('storage', ['chikouguhinban' => $mockdata]);
    }

    /**
     * 在庫リストの削除テスト
     *
     * @return void
     */
    public function testDeleteStorage()
    {
        //  ログイン
        $this->getUser();

        //  一番上の削除ボタンを押す
        $this->visit('/admin/storage/index')
            ->press('削除')
            ->seePageIs('/admin/storage/index')
            ->see('データを削除しました。');
    }
}
