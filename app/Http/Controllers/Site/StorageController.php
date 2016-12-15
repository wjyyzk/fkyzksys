<?php

namespace App\Http\Controllers\Site;

//  データベース
use App\Storage;

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
        //  モデル
        $storage = new Storage;

    	//  在庫リストを取得する
        $models = $storage->Filter();

        //  画面を表示する
        return view('site/storage/index')
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