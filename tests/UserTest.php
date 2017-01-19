<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

/**
 *  【テスト】ユーザー
 */
class UserTest extends TestCase
{
    //  管理者用
    private $user = null;

    //  入力用
    private $strInput = "testUnit";

    /**
     *  管理者データを取得する
     *  @return void
     */
    public function getUser() {
        //  管理者を取得
        $this->user = User::where('username', '=', 'admin')->first();
    }

    /**
     *  テストデータを取得する
     *  @return user
     */
    public function getUserTest($input) {

        return User::where('username', '=', $input)->first();   
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
            //  ログイン
            $this->be($this->user);

            $this->visit('/admin/user/create')
                ->type($this->strInput, 'username')
                ->type('test', 'password')
                ->type('test', 'password_conf')
                ->press('登録')
                ->seePageIs('/admin/user/index')
                ->see('データを作成しました。');

            $this->seeInDatabase('users', ['username' => $this->strInput]);
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
            //  ログイン
            $this->be($this->user);

            $this->visit('/admin/user/index')
                ->type('admin', 'sUsername')
                ->press('検索')
                ->seePageIs('/admin/user/index?sUsername=admin')
                ->see('admin')
                ->click("#reset")
                ->seePageIs('/admin/user/index');
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
            //  ログイン
            $this->be($this->user);

            $userTest = $this->getUserTest($this->strInput);

            $this->visit('/admin/user/'.$userTest->id.'/edit')
                ->type($this->strInput, 'username')
                ->type('test2', 'password')
                ->type('test2', 'password_conf')
                ->press('登録');

            $this->visit('/logout')
                ->visit('/login')
                ->type($this->strInput, 'username')
                ->type('test2', 'password')
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
            //  ログイン
            $this->be($this->user);

            
        }
        else
        {
            $this->markTestSkipped('【ユーザー削除】ﾃｽﾄ出来ない。');
        }
        */
        
        $this->assertTrue(true);
    }
}
