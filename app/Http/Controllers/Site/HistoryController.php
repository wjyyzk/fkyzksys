<?php

namespace App\Http\Controllers\Site;

//  データベース
use App\History;

/**
 *  【コントローラ】履歴
 */
class HistoryController extends MasterSite
{
    /**
     *	ホーム
     *  @return     view
     */
    public function index()
    {
        

        //  モデル
        $history = new History;

        //  在庫リストを取得する
        $models = $history->filter();

        //  マニュアルでPaginationを設定したから、ページのリンク先を設定しなければならない
        //  例：/url?param
        $models->setPath('history');

    	return view('site/history/index')
            ->with('models', $models);
    }
}