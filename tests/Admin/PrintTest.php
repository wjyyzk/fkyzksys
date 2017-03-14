<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 *  【テスト】印刷
 */
class PrintTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
	public function testRoute()
	{
		//  【管理画面】印刷
        $this->visit('/admin/print/index')
        	->seePageIs('/login');

        //  ログイン
        $this->getUser();

        //  印刷
        $this->visit('/admin/print/index')
            ->seePageIs('/admin/print/index');
	}
}