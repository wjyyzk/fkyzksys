<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

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

        //  管理者を取得
        $user = User::where('username', 'admin')->first();

        //  ユーザーを確認する
        if($user)
        {
            $this->be($user);

            //  業者
            $this->visit('/admin/merchant/index')
                ->seePageIs('/admin/merchant/index');

            $this->visit('/admin/merchant/create')
                ->seePageIs('/admin/merchant/create');
        }
        else
        {
            $this->markTestSkipped('【管理画面ルート】ﾃｽﾄ出来ない。');
        }
	}
}
