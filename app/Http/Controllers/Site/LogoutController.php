<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\Auth;

/**
 *  【コントローラ】ログアウト
 */
class LogoutController extends MasterSite
{
	//	GET
    public function getIndex()
    {
    	Auth::logout();

    	return redirect('/storage/index');
    }
}
