<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 *  【テスト】アップロード
 */
class UploadTest extends TestCase
{
    /**
    * ルートテスト
    *
    * @return void
    */
	public function testRoute()
	{
        //  アップロード
        $this->visit('/ht/upload')
        	->seePageIs('/ht/upload');
	}
}