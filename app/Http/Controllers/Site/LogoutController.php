<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

//  バリデータ
use App\Http\Requests;

//  データベース
//use

/*
 *  【コントローラ】ログアウト
 */
class LogoutController extends MasterSite
{
	//	GET
    public function getIndex()
    {
    	return redirect('/storage');
    }
}
