<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

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

        //  管理者を取得
        $user = User::where('username', 'admin')->first();

        //  ユーザーを確認する
        if($user)
        {
            $this->be($user);

            //  担当者
            $this->visit('/admin/pic/index')
                ->seePageIs('/admin/pic/index');

            $this->visit('/admin/pic/create')
                ->seePageIs('/admin/pic/create');
        }
        else
        {
            $this->markTestSkipped('【管理画面ルート】ﾃｽﾄ出来ない。');
        }
	}
}
