<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 *  【テスト】在庫リスト
 */
class StorageTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
	public function testRoute()
	{
        //  在庫一覧
        $this->visit('/storage/index')
            ->seePageIs('/storage/index');
	}
}
