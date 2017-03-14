<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\PIC;

/**
 *  【テスト】担当者
 */
class PICTest extends TestCase
{
    /**
     *  テストデータを取得する
     *  @return pic
     */
    public function getModelTest($input) 
    {
        return PIC::where('name', '=', $input)->first();
    }

    /**
    * ルートテスト
    *
    * @return void
    */
	public function testRoute()
	{
        //  【管理画面】担当者
        $this->visit('/admin/pic/index')
            ->seePageIs('/login');

        //  ログイン
        $this->getUser();

        //  担当者
        $this->visit('/admin/pic/index')
            ->seePageIs('/admin/pic/index');

        $this->visit('/admin/pic/create')
            ->seePageIs('/admin/pic/create');
	}

    /**
     * PICの登録テスト
     *
     * @return void
     */
    public function testNewPIC()
    {
        //  ログイン
        $this->getUser();

        $mockdata = str_random(10);

        $this->visit('/admin/pic/create')
            ->type($mockdata, 'name')
            ->type('フリガナ', 'furigana')
            ->press('登録')
            ->seePageIs('/admin/pic/index')
            ->see('データを作成しました。');

        $this->seeInDatabase('pic', ['name' => $mockdata]);
    }

    /**
     * PICの検索テスト
     *
     * @return void
     */
    public function testSearchPIC()
    {
        //  ログイン
        $this->getUser();

        $this->visit('/admin/pic/index')
            ->type('髙岡', 'sName')
            ->press('検索')
            ->seePageIs('/admin/pic/index?sName=%E9%AB%99%E5%B2%A1')
            ->see('髙岡')
            ->click("#reset")
            ->seePageIs('/admin/pic/index');
    }

    /**
     * PICの更新テスト
     *
     * @return void
     */
    public function testUpdatePIC()
    {
        //  ログイン
        $this->getUser();

        $model = $this->getModelTest('髙岡');

        //  データを更新する
        $this->visit('/admin/pic/'.$model->id.'/edit')
            ->type('髙岡', 'name')
            ->type('タカオカ', 'furigana')
            ->press('登録');

        $this->seeInDatabase('pic', ['name' => '髙岡']);
    }

    /**
     * PICの削除テスト
     *
     * @return void
     */
    public function testDeleteUser()
    {
        //  ログイン
        $this->getUser();

        //  一番上の削除ボタンを押す
        $this->visit('/admin/pic/index')
            ->press('削除')
            ->seePageIs('/admin/pic/index')
            ->see('データを削除しました。');
    }
}