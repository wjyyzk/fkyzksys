<?php

namespace App\Http\Controllers\Site;

use Request;

//  データベース
use App\Models\Storage;
use App\Models\Merchant;
use App\Models\PIC;
use App\Models\Masters\M_Order;

/**
 *	【コントローラ】在庫リスト
 */
class StorageController extends MasterSite
{
    /**
     *	ホーム
     *  @return     view
     */
    public function index()
    {
        //  業者データを取得する
        $m_merchants = (new Merchant)
            ->orderBy('furigana', 'asc')
            ->pluck('name', 'id')
            ->prepend('', 0);

        //  並び順マスターデータを取得する
        $m_orders = (new M_Order)->attributes();

        //  並び順の初期化
        if(!(Request::has('sOrder') && Request::get('sOrder')))
            Request::merge(array('sOrder' => 'hinban'));

        //  モデル
        $storage = new Storage;

    	//  在庫リストを取得する
        $models = $storage->Filter();

        //  ページを移動するため
        if (\Request::ajax()) {
            return \Response::json(view('site/storage/list')
                ->with('m_merchants', $m_merchants)
                ->with('models', $models)
                ->render());
        }

        //  画面を表示する
        return view('site/storage/index')
            ->with('m_merchants', $m_merchants)
            ->with('m_orders', $m_orders)
        	->with('models', $models);
    }

    /**
     *	詳細
     *  @param      id
     *  @return     view
     */
    public function show($id)
    {
        //  モデルを取得する
        $model = Storage::findOrFail($id);

        //  画面を表示する
        return view('site/storage/show')
            ->with('model', $model);
    }
}