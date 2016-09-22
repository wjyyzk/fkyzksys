<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class RouteTest extends TestCase
{
    /**
     * ルートテスト
     *
     * @return void
     */
    public function testRoute()
    {
    	//	ホーム
        $this->visit('/')
        	->seePageIs('/storage');

    	//	在庫一覧
        $this->visit('/storage')
        	->seePageIs('/storage');

        //	ログイン
        $this->visit('/login')
        	->seePageIs('/login');

        //	【管理画面】在庫リスト
        $this->visit('/admin/storage/index')
        	->seePageIs('/login');

       	//	【管理画面】ユーザー
        $this->visit('/admin/user/index')
        	->seePageIs('/login');

        //  管理者を取得
        $user = User::where('username', 'admin')->first();
        
        //  ユーザーを確認する
        if($user)
        {
            $this->be($user);

            $this->visit('/admin/storage/index')
                ->seePageIs('/admin/storage/index');

            $this->visit('/admin/user/index')
                ->seePageIs('/admin/user/index');
        }
        else
        {
            $this->markTestSkipped('【管理画面ルート】ﾃｽﾄ出来ない。');
        }
    }
}
