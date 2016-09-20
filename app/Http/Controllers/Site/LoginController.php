<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

//  バリデータ
use App\Http\Requests;

//  データベース
//use

/*
 *  【コントローラ】ログイン
 */
class LoginController extends MasterSite
{
	//	GET
    public function getIndex()
    {
        return view('site/login/index');
    }

    /*
     *	POST
	 *	@param request
	 *	@return view
	 */
	public function postIndex()
    {
        return redirect('admin/storage/index');
    }
}
