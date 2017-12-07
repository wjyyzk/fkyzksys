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

        $mockdata = str_random(10);

        $this->visit('/admin/merchant/create')
            ->type($mockdata, 'name')
            ->type('フリガナ', 'furigana')
            ->press('登録')
            ->seePageIs('/admin/merchant/index')
            ->see('データを作成しました。');

        $this->seeInDatabase('merchant', ['name' => $mockdata]);
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

        $model = Merchant::first();

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

        $model = Merchant::orderBy('id', 'desc')->first();

        $mockdata = str_random(10);

        //  データを更新する
        $this->visit('/admin/merchant/'.$model->id.'/edit')
            ->type($mockdata, 'name')
            ->press('登録');

        $this->seeInDatabase('merchant', ['name' => $mockdata]);
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

        //  一番上の削除ボタンを押す
        $this->visit('/admin/merchant/index')
            ->press('削除')
            ->seePageIs('/admin/merchant/index')
            ->see('データを削除しました。');
    }
}