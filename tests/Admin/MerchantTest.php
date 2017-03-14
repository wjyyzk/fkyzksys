<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Merchant;

/**
 *  【テスト】業者
 */
class MerchantTest extends TestCase
{
    /**
     *  テストデータを取得する
     *  @return pic
     */
    public function getModelTest($input) 
    {
        return Merchant::where('name', '=', $input)->first();
    }

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

        $this->visit('/admin/merchant/index')
            ->type('矢崎化工', 'sName')
            ->press('検索')
            ->seePageIs('/admin/merchant/index?sName=%E7%9F%A2%E5%B4%8E%E5%8C%96%E5%B7%A5')
            ->see('矢崎化工')
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

        $model = $this->getModelTest('矢崎化工');

        //  データを更新する
        $this->visit('/admin/merchant/'.$model->id.'/edit')
            ->type('矢崎化工', 'name')
            ->press('登録');

        $this->seeInDatabase('merchant', ['name' => '矢崎化工']);
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