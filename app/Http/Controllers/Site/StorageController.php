<?php

namespace App\Http\Controllers\Site;

//  データベース
use App\Storage;
use App\Merchant;
use App\PIC;

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

        //  モデル
        $storage = new Storage;

    	//  在庫リストを取得する
        $models = $storage->Filter();

        //  画面を表示する
        return view('site/storage/index')
            ->with('m_merchants', $m_merchants)
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