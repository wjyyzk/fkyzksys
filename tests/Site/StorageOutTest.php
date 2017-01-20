<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 *  【テスト】出庫
 */
class StorageOutTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
	public function testRoute()
	{
        //  出庫入力フォーム
        $this->visit('/storage/out/create')
        	->seePageIs('/storage/out/create');
	}
}
