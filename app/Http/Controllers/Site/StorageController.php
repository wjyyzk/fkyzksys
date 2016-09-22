<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

//	バリデータ
use App\Http\Requests;

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
        $models = Storage::orderBy('id', 'desc')->paginate(10);

        return view('site/storage/index')->with('models', $models);
    }
}