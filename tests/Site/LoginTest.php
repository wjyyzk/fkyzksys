<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 *  【テスト】ログイン
 */
class LoginTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */   
    public function testRoute()
    {
        //  ログイン
        $this->visit('/login')
            ->seePageIs('/login');
    }

    /**
     * ログインが成功する
     *
     * @return void
     */
    public function testValidLogin()
    {
        $model = factory(App\Models\User::class)->create();

        $this->visit('/login')
            ->type($model->username, 'username')
            ->type('test', 'password')
            ->press('ログイン')
            ->seePageIs('/admin/storage/index');
    }

    /**
     * ログインが失敗する
     *
     * @return void
     */
    public function testInvalidLogin()
    {
        //  入力間違っている場合
        $this->visit('/login')
            ->type('admin', 'username')
            ->type('wrong', 'password')
            ->press('ログイン')
            ->seePageIs('/login')
            ->see('ログインに失敗しました。');

        //  削除したユーザーの場合
        $user = factory(App\Models\User::class)->create();
        $user->delete();

        $this->visit('/login')
            ->type($user->username, 'username')
            ->type('test', 'password')
            ->press('ログイン')
            ->seePageIs('/login')
            ->see('ログインに失敗しました。');
    }
}