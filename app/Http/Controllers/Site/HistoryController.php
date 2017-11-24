<?php

namespace App\Http\Controllers\Site;

//  データベース
use App\History;
use App\M_Type;
use App\M_Hinban_Type;

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
        $hinban_types = (new M_Hinban_Type)->attributes();

        //  モデル
        $history = new History;

        //  在庫リストを取得する
        $models = $history->filter();

        //  マニュアルでPaginationを設定したから、ページのリンク先を設定しなければならない
        //  例：/url?param
        $models->setPath('history');

    	return view('site/history/index')
            ->with('models', $models)
            ->with('types', $types)
            ->with('hinban_types', $hinban_types);
    }
}