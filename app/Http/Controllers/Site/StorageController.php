<?php

namespace App\Http\Controllers\Site;

//  データベース
use App\Storage;

/*
 *	【コントローラ】在庫リスト
 */
class StorageController extends MasterSite
{
    //	ホーム
    public function index()
    {
    	//  在庫リストを取得する
        $models = Storage::Filter();

        //  画面を表示する
        return view('site/storage/index')
        	->with('models', $models)
            ->with('totalFee', Storage::totalFee());
    }

    //	詳細
    public function show($id)
    {
        //  モデルを取得する
        $model = Storage::findOrFail($id);

        //  画面を表示する
        return view('site/storage/show')
            ->with('model', $model);
    }
}