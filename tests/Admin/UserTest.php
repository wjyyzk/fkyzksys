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

        //  テストデータを作成する
        $model = factory(App\Models\User::class)->create();

        $this->visit('/admin/user/index')
            ->type($model->username, 'sUsername')
            ->press('検索')
            ->see($model->username)
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

        //  テストデータを作成する
        $model = factory(App\Models\User::class)->create();

        //  データを更新する
        $this->visit('/admin/user/'.$model->id.'/edit')
            ->type('test', 'password')
            ->type('test', 'password_conf')
            ->press('登録');

        //  更新したデータでログインする
        $this->visit('/logout')
            ->visit('/login')
            ->type($model->username, 'username')
            ->type('test', 'password')
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

        //  テストデータを作成する
        factory(App\Models\User::class)->create();

        //  一番上の削除ボタンを押す
        $this->visit('/admin/user/index')
            ->press('削除')
            ->seePageIs('/admin/user/index')
            ->see('データを削除しました。');
    }
}