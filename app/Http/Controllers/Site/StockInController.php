<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 *	【コントローラ】入庫
 */
class StockInController extends MasterSite
{

    /**
     *  レクエスト
     *  @param          入力フォーム
     *  @return         
     */
    private function setInput($request)
    {
        return array(
        );
    }

    /**
     *  GET
     *  @return view
     */
    public function create()
    {
        return view('site/stock/in/create');
    }

    /**
     *	POST
	 *	@param request
	 *	@return view
	 */
	public function store(Request $request)
    {
        return null;
    }

}
