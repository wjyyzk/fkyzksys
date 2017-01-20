<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 *  【テスト】入庫
 */
class StorageInTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
	public function testRoute()
	{
        //  入庫入力フォーム
        $this->visit('/storage/in/create')
        	->seePageIs('/storage/in/create');
	}
}
