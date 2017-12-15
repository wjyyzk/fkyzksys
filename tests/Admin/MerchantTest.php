<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Merchant;

/**
 *  【テスト】業者
 */
class MerchantTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
	public function testRoute()
	{
        //  【管理画面】業者
        $this->visit('/admin/merchant/index')
        	->seePageIs('/login');

        //  ログイン
        $this->getUser();

        //  業者
        $this->visit('/admin/merchant/index')
            ->seePageIs('/admin/merchant/index');

        $this->visit('/admin/merchant/create')
            ->seePageIs('/admin/merchant/create');
	}

    /**
     * 業者の登録テスト
     *
     * @return void
     */
    public function testNewMerchant()
    {
        //  ログイン
        $this->getUser();

        $name = str_random(10);
        $furigana = str_random(10);

        $this->visit('/admin/merchant/create')
            ->type($name, 'name')
            ->type($furigana, 'furigana')
            ->press('登録')
            ->seePageIs('/admin/merchant/index')
            ->see('データを作成しました。');

        //  最新情報を取得する
        $model = Merchant::where('name', $name)->first();
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
     * 業者の検索テスト
     *
     * @return void
     */
    public function testSearchMerchant()
    {
        //  ログイン
        $this->getUser();

        //  テストデータを作成する
        $model = factory(App\Models\Merchant::class)->create();

        $this->visit('/admin/merchant/index')
            ->type($model->name, 'sName')
            ->press('検索')
            ->see($model->name)
            ->click("#reset")
            ->seePageIs('/admin/merchant/index');
    }

    /**
     * 業者の更新テスト
     *
     * @return void
     */
    public function testUpdateMerchant()
    {
        //  ログイン
        $this->getUser();

        //  テストデータを作成する
        $model = factory(App\Models\Merchant::class)->create();

        $name = str_random(10);
        $furigana = str_random(10);

        //  データを更新する
        $this->visit('/admin/merchant/'.$model->id.'/edit')
            ->type($name, 'name')
            ->type($furigana, 'furigana')
            ->press('登録');

        //  最新情報を取得する
        $model = Merchant::where('name', $name)->first();
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
     * 業者の削除テスト
     *
     * @return void
     */
    public function testDeleteMerchant()
    {
        //  ログイン
        $this->getUser();

        //  テストデータを作成する
        factory(App\Models\Merchant::class)->create();

        //  一番上の削除ボタンを押す
        $this->visit('/admin/merchant/index')
            ->press('削除')
            ->seePageIs('/admin/merchant/index')
            ->see('データを削除しました。');
    }
}