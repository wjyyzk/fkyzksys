<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

//	バリデータ
use App\Http\Requests;

//	データベース
//use

/*
 *	【コントローラ】在庫リスト
 */
class StorageController extends MasterSite
{
	//	【GET】
    public function getIndex()
    {
        return view('site/storage/index');
    }

    /*
     *	POST
	 *	@param request
	 *	@return view
	 */
	public function postStore(StoreApplicationRequest $request)
    {
        return view('site/storage/index');
    }
}