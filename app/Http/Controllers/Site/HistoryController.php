<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;

//  データベース
use App\History;

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
        //  モデル
        $history = new History;

        //  在庫リストを取得する
        $models = $history->filter();

        //  マニュアルでPaginationを設定したから、ページのリンク先を設定しなければならない
        //  例：/url?param
        $models->setPath('history');

    	return view('site/history/index')
            ->with('models', $models);
    }

    /**
     *	詳細
     *  @param      id
     *  @return     view
     */
    public function show($id)
    {
    	return view('site/history/show');
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
        $model = User::findOrFail($id);

        return view('admin/user/edit')->with('model', $model);
    }

    /**
     * 更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //  モデルを取得する
        $model = User::findOrFail($id);

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
        $model = User::findOrFail($id);

        //  データを削除する
        $model->delete();

        //  メッセージ
        Session::flash('message', 'データを削除しました。');

        //  保存したURLに移動する
        return redirect(Session::get('requestReferrer'));
    }
}