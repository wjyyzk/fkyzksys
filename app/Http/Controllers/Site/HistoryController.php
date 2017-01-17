<?php

namespace App\Http\Controllers\Site;

//  データベース
use App\History;
use App\M_Type;

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
        //  検索タイプ
        $types = (new M_Type)->attributes();

        //  モデル
        $history = new History;

        //  在庫リストを取得する
        $models = $history->filter();

        //  マニュアルでPaginationを設定したから、ページのリンク先を設定しなければならない
        //  例：/url?param
        $models->setPath('history');

    	return view('site/history/index')
            ->with('models', $models)
            ->with('types', $types);
    }
}