<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

/**
 *  【テスト】印刷
 */
class PrintTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
	public function testRoute()
	{
		//  【管理画面】印刷
        $this->visit('/admin/print/index')
        	->seePageIs('/login');

        //  管理者を取得
        $user = User::where('username', 'admin')->first();

        //  ユーザーを確認する
        if($user)
        {
            $this->be($user);

            //  印刷
            $this->visit('/admin/print/index')
                ->seePageIs('/admin/print/index');
        }
        else
        {
            $this->markTestSkipped('【管理画面ルート】ﾃｽﾄ出来ない。');
        }
	}
}
