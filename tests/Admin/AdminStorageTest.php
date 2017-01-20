<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

/**
 *  【テスト】在庫リスト
 */
class AdminStorageTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
    public function testRoute()
    {
        //  【管理画面】在庫リスト
        $this->visit('/admin/storage/index')
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
        }
        else
        {
            $this->markTestSkipped('【管理画面ルート】ﾃｽﾄ出来ない。');
        }
    }

    /**
     * 在庫リストの検索テスト
     *
     * @return void
     */
    public function testSearchStorage()
    {
        $this->assertTrue(true);
    }

    /**
     * 在庫リストの登録ﾃｽﾄ
     *
     * @return void
     */
    public function testNewStorage()
    {
        $this->assertTrue(true);
    }

    /**
     * 在庫リストの更新テスト
     *
     * @return void
     */
    public function testUpdateStorage()
    {
        $this->assertTrue(true);
    }

    /**
     * 在庫リストの削除テスト
     *
     * @return void
     */
    public function testDeleteStorage()
    {
        $this->assertTrue(true);
    }            
}
