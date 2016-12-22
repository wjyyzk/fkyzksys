<?php

namespace App\Http\Controllers\Site;

//  バリデータ
use App\Http\Requests;
use App\Http\Requests\StockOutRequest;

/**
 *  【コントローラ】出庫
 */
class StockOutController extends MasterSite
{

    /**
     *  レクエスト
     *  @param          入力フォーム
     *  @return         
     */
    private function setInput($request)
    {
        return array(
            'id'        =>  $request->id,
            'stock'     =>  $request->stock
        );
    }

    /**
     *  GET
     *  @return view
     */
    public function create()
    {
        return view('site/stock/out/create');
    }

    /**
     *  POST
     *  @param request
     *  @return view
     */
	public function store(StockOutRequest $request)
    {
        $input = $this->setInput($request);

        return null;
    }

}