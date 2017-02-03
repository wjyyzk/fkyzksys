<?php

namespace App\Http\Controllers\Site;

use Session;

//  バリデータ
use App\Http\Requests\StockOutRequest;

//  モデル
use App\StorageOut;

/**
 *  【コントローラ】出庫
 */
class StorageOutController extends MasterSite
{
    /**
     *  レクエスト
     *  @param          入力フォーム
     *  @return         
     */
    private function setInput($request)
    {
        return array(
            'storage_id'    =>  $request->id,
            'stock'         =>  $request->stock,
            'date'          =>  date('Y-m-d'),
            'time'          =>  date('H:i:s'),
            'ip'            =>  $request->ip()
        );
    }

    /**
     *  出庫入力画面
     *  @return view
     */
    public function create()
    {
        return view('site/storage/out/create');
    }

    /**
     *  出庫入力処理
     *  @param request
     *  @return view
     */
	public function store(StockOutRequest $request)
    {
        $input = $this->setInput($request);

        //  モデルを登録する
        StorageOut::create($input);

        //  メッセージ
        Session::flash('message', 'データを登録しました。');

        return redirect('/storage/out/create');
    }

    /**
     * 編集画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //  前回URLを保存する
        Session::put('requestReferrer', app('url')->previous());

        //  モデルを取得する
        $model = StorageOut::with('storage')->findOrFail($id);

        return view('site/storage/out/edit')->with('model', $model);
    }

    /**
     * 更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StockOutRequest $request, $id)
    {
        //  モデルを取得する
        $model = StorageOut::findOrFail($id);

        //  レクエストを取得
        $input = $this->setInput($request);

        //  データを更新する
        $model->fill($input)->save();

        //  メッセージ
        Session::flash('message', 'データを更新しました。');

        //  保存したURLに移動する
        return redirect(Session::get('requestReferrer'));
    }

    /**
     * 削除処理
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  前回URLを保存する
        Session::put('requestReferrer', app('url')->previous());

        //  モデルを取得する
        $model = StorageOut::findOrFail($id);

        //  データを削除する
        $model->delete();

        //  メッセージ
        Session::flash('message', 'データを削除しました。');

        //  保存したURLに移動する
        return redirect(Session::get('requestReferrer'));
    }
}