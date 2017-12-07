<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\User;

/**
 *  【テスト】ユーザー
 */
class UserTest extends TestCase
{
    /**
     *  テストデータを取得する
     *  @return user
     */
    public function getUserTest($input) 
    {
        return User::where('username', '=', $input)->first();
    }

    /**
    * ルートテスト
    *
    * @return void
    */
    public function testRoute()
    {
        //  【管理画面】ユーザー
        $this->visit('/admin/user/index')
            ->seePageIs('/login');

        //  ログイン
        $this->getUser();
        
        //  ユーザー
        $this->visit('/admin/user/index')
            ->seePageIs('/admin/user/index');

        $this->visit('/admin/user/create')
            ->seePageIs('/admin/user/create');
    }

    /**
     * ユーザーの登録テスト
     *
     * @return void
     */
    public function testNewUser()
    {
        //  ログイン
        $this->getUser();

        $username = str_random(10);

        $this->visit('/admin/user/create')
            ->type($username, 'username')
            ->type('test', 'password')
            ->type('test', 'password_conf')
            ->press('登録')
            ->seePageIs('/admin/user/index')
            ->see('データを作成しました。');

        $this->seeInDatabase('users', ['username' => $username]);
    }

    /**
     * ユーザーの検索テスト
     *
     * @return void
     */
    public function testSearchUser()
    {
        //  ログイン
        $this->getUser();

        $this->visit('/admin/user/index')
            ->type('admin', 'sUsername')
            ->press('検索')
            ->see('admin')
            ->click("#reset")
            ->seePageIs('/admin/user/index');
    }

    /**
     * ユーザーの更新テスト
     *
     * @return void
     */
    public function testUpdateUser()
    {
        //  ログイン
        $this->getUser();

        $userTest = $this->getUserTest('admin');

        //  データを更新する
        $this->visit('/admin/user/'.$userTest->id.'/edit')
            ->type('admin', 'password')
            ->type('admin', 'password_conf')
            ->press('登録');

        //  更新したデータでログインする
        $this->visit('/logout')
            ->visit('/login')
            ->type('admin', 'username')
            ->type('admin', 'password')
            ->press('ログイン')
            ->seePageIs('/admin/storage/index');
    }

    /**
     * ユーザーの削除テスト
     *
     * @return void
     */
    public function testDeleteUser()
    {
        //  ログイン
        $this->getUser();

        //  一番上の削除ボタンを押す
        $this->visit('/admin/user/index')
            ->press('削除')
            ->seePageIs('/admin/user/index')
            ->see('データを削除しました。');
    }
}