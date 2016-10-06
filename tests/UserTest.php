<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UserTest extends TestCase
{
    protected $user = null;
 
    public function getUser() {
        //  管理者を取得
        $this->user = User::where('username', 'admin')->first();
    }

    /**
     * ユーザーの登録テスト
     *
     * @return void
     */
    public function testNewUser()
    {
        $this->getUser();

        //  ユーザーを確認する
        if($this->user)
        {
            //  新しいユーザーを登録する
            $this->be($this->user);

            $this->visit('/admin/user/create')
                ->type('UnitTest', 'username')
                ->type('test', 'password')
                ->type('test', 'password_conf')
                ->press('登録')
                ->seePageIs('/admin/user/index')
                ->see('データを作成しました。');

            $this->seeInDatabase('users', ['username' => 'UnitTest']);
        }
        else
        {
            $this->markTestSkipped('【ユーザー登録】ﾃｽﾄ出来ない。');
        }
    }

    /**
     * ユーザーの検索テスト
     *
     * @return void
     */
    public function testSearchUser()
    {
        $this->getUser();        

        //  ユーザーを確認する
        if($this->user)
        {
            //  新しいユーザーを登録する
            $this->be($this->user);

            $this->visit('/admin/user/index')
                ->type('admin', 'sUsername')
                ->press('検索')
                ->seePageIs('/admin/user/index?sUsername=admin')
                ->see('admin');
        }
        else
        {
            $this->markTestSkipped('【ユーザー検索】ﾃｽﾄ出来ない。');
        }
    }

    /**
     * ユーザーの更新テスト
     *
     * @return void
     */
    public function testUpdateUser()
    {
        $this->getUser();

        //  ユーザーを確認する
        if($this->user)
        {
            //  新しいユーザーを登録する
            $this->be($this->user);

            $this->visit('/admin/user/1/edit')
                ->type('admin', 'username')
                ->type('test', 'password')
                ->type('test', 'password_conf')
                ->press('登録');

            $this->visit('/logout')
                ->visit('/login')
                ->type('admin', 'username')
                ->type('test', 'password')
                ->press('ログイン')
                ->seePageIs('/admin/storage/index');
        }
        else
        {
            $this->markTestSkipped('【ユーザー編集】ﾃｽﾄ出来ない。');
        }
    }

    /**
     * ユーザーの削除テスト
     *
     * @return void
     */
    public function testDeleteUser()
    {
        /*
        $this->getUser();

        //  ユーザーを確認する
        if($this->user)
        {
            //  新しいユーザーを登録する
            $this->be($this->user);

            //$this->visit('/admin/user/index')
        }
        else
        {
            $this->markTestSkipped('【ユーザー削除】ﾃｽﾄ出来ない。');
        }
        */
    }
}
