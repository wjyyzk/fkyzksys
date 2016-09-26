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

        return view('site/storage/index')
        	->with('models', $models)
            ->with('totalFee', Storage::totalFee()->total);
    }

    //	詳細
    public function show($id)
    {
        //  モデルを取得する
        $model = Storage::findOrFail($id);

        return view('site/storage/show')->with('model', $model);
    }
}