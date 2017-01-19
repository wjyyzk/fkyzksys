<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

/**
 *  【テスト】ルート
 */
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
        ->seePageIs('/storage/index');

        //  在庫一覧
        $this->visit('/storage/index')
        ->seePageIs('/storage/index');

        //  入庫入力フォーム
        $this->visit('/storage/in/create')
        ->seePageIs('/storage/in/create');

        //  出庫入力フォーム
        $this->visit('/storage/out/create')
        ->seePageIs('/storage/out/create');

        //  出庫入力フォーム
        $this->visit('/history')
        ->seePageIs('/history');

        //  出庫入力フォーム
        $this->visit('/ht/upload')
        ->seePageIs('/ht/upload');

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

            //  在庫リスト
            $this->visit('/admin/storage/index')
                ->seePageIs('/admin/storage/index');

            $this->visit('/admin/storage/create')
                ->seePageIs('/admin/storage/create');

            //  印刷
            $this->visit('/admin/print/index')
                ->seePageIs('/admin/print/index');

            //  業者
            $this->visit('/admin/merchant/index')
                ->seePageIs('/admin/merchant/index');

            $this->visit('/admin/merchant/create')
                ->seePageIs('/admin/merchant/create');

            //  担当者
            $this->visit('/admin/pic/index')
                ->seePageIs('/admin/pic/index');

            $this->visit('/admin/pic/create')
                ->seePageIs('/admin/pic/create');

            //  ユーザー
            $this->visit('/admin/user/index')
                ->seePageIs('/admin/user/index');
        }
        else
        {
            $this->markTestSkipped('【管理画面ルート】ﾃｽﾄ出来ない。');
        }
    }
}
