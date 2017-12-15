<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\PIC;

/**
 *  【テスト】担当者
 */
class PICTest extends TestCase
{
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

        $name = str_random(10);
        $furigana = str_random(10);

        $this->visit('/admin/pic/create')
            ->type($name, 'name')
            ->type($furigana, 'furigana')
            ->press('登録')
            ->seePageIs('/admin/pic/index')
            ->see('データを作成しました。');

        //  最新情報を取得する
        $model = PIC::where('name', $name)->first();
        if($model)
        {
            //  名前
            $this->assertEquals($model->name, $name);
            //  ふりがな
            $this->assertEquals($model->furigana, $furigana);
        }
        else
            $this->assertTrue(false);
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

        //  テストデータを作成する
        $model = factory(App\Models\PIC::class)->create();

        $this->visit('/admin/pic/index')
            ->type($model->name, 'sName')
            ->press('検索')
            ->see($model->name)
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

        //  テストデータを作成する
        $model = factory(App\Models\PIC::class)->create();

        $name = str_random(10);
        $furigana = str_random(10);

        //  データを更新する
        $this->visit('/admin/pic/'.$model->id.'/edit')
            ->type($name, 'name')
            ->type($furigana, 'furigana')
            ->press('登録');

        //  最新情報を取得する
        $model = PIC::where('name', $name)->first();
        if($model)
        {
            //  名前
            $this->assertEquals($model->name, $name);
            //  ふりがな
            $this->assertEquals($model->furigana, $furigana);
        }
        else
            $this->assertTrue(false);
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

        //  テストデータを作成する
        factory(App\Models\PIC::class)->create();

        //  一番上の削除ボタンを押す
        $this->visit('/admin/pic/index')
            ->press('削除')
            ->seePageIs('/admin/pic/index')
            ->see('データを削除しました。');
    }
}