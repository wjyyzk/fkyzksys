<?php

use App\User;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://fukaya.jp.yazaki.local';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    //  管理者用
    public $user = null;

    /**
     *  管理者データを取得する
     *  @return void
     */
    public function getUser() 
    {
        //  管理者を取得する
        $this->user = User::where('username', '=', 'admin')->first();

        //  ユーザーを確認する
        if($this->user)
        {
            //  ログイン
            $this->be($this->user);
        }
        else
        {
            $this->markTestSkipped('【管理画面ルート】ﾃｽﾄが失敗した');
        }
    }
}