<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

//  モデル
use App\Storage;

/**
 *  【管理コントローラ】印刷
 */
class PrintController extends MasterAdmin
{
	//	【画面】表示　
    public function index()
    {
        //  在庫リストを取得する
        $models = Storage::Filter();

        //  画面を表示する
        return view('admin/print/index')
            ->with('models', $models);
    }
    
    //	印刷処理
    public function runPrint($id)
    {
        //  モデルを取得する
        $model = Storage::findOrFail($id);

        //  オブジェクト作成
        $pdf = \App::make('dompdf.wrapper');

        //  PDF設定
        $pdf = \PDF::loadView('admin/print/print', compact('model'))
                ->setPaper(array(0, 0, 340, 151));

        //  表示する
        return $pdf->stream('print.pdf');
    }
}
