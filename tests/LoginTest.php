<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * ログインのテスト
     *
     * @return void
     */
    public function testValidLogin()
    {
    	$this->visit('/login')
    		->type('admin', 'username')
    		->type('admin', 'password')
    		->press('ログイン')
    		->seePageIs('/admin/storage/index');
    }

    /**
     * ログイン失敗のテスト
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
        $user = factory(App\User::class, 1)->create();
        $user->delete();
        $this->visit('/login')
            ->type($user->username, 'username')
            ->type('test', 'password')
            ->press('ログイン')
            ->seePageIs('/login')
            ->see('ログインに失敗しました。');
    }
}