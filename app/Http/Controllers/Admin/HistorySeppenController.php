<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;

//  バリデータ
use App\Http\Requests;
use App\Http\Requests\Admin\HistorySeppenRequest;

//  データベース
use App\HistorySeppen;

/*
 *  【管理コントローラ】設変履歴
 */
class HistorySeppenController extends MasterAdmin
{
    //  レクエスト
    private function setInput($storage_id, $request)
    {
        return array(
            'storage_id'    =>  $storage_id,
            'comment'       =>  $request->comment
        );
    }

    /**
     * 一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function showlist($storage_id)
    {
        //  設変履歴
        $models = HistorySeppen::filter($storage_id);

        return view('admin/historyseppen/list')
            ->with('storage_id', $storage_id)
            ->with('models', $models);
    }

    /**
     * 一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index($storage_id)
    {
        //  設変履歴
        $models = HistorySeppen::filter($storage_id);

        return view('admin/historyseppen/index')
            ->with('storage_id', $storage_id)
            ->with('models', $models);
    }

    /**
     * 作成画面
     *
     * @return \Illuminate\Http\Response
     */
    public function create($storage_id)
    {
        return view('admin/historyseppen/create')
            ->with('storage_id', $storage_id);
    }

    /**
     * 登録処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($storage_id, HistorySeppenRequest $request)
    {
        //  レクエストを取得
        $input = $this->setInput($storage_id, $request);

        //  設変履歴を作成する
        HistorySeppen::create($input);

        //  メッセージ
        Session::flash('message', 'データを作成しました。');

        return redirect('/admin/storage/'.$storage_id.'/history');
    }

    /**
     * 編集画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($storage_id, $id)
    {
        //  前回URLを保存する
        Session::put('requestReferrer', app('url')->previous());

        //  モデルを取得する
        $model = HistorySeppen::findOrFail($id);

        return view('admin/historyseppen/edit')
            ->with('storage_id', $storage_id)
            ->with('model', $model);
    }

    /**
     * 更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($storage_id, HistorySeppenRequest $request, $id)
    {
        //  モデルを取得する
        $model = HistorySeppen::findOrFail($id);

        //  レクエストを取得
        $input = $this->setInput($storage_id, $request);

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
    public function destroy($storage_id, $id)
    {
        //  前回URLを保存する
        Session::put('requestReferrer', app('url')->previous());

        //  モデルを取得する
        $model = HistorySeppen::findOrFail($id);

        //  データを削除する
        $model->delete();

        //  メッセージ
        Session::flash('message', 'データを削除しました。');

        //  保存したURLに移動する
        return redirect(Session::get('requestReferrer'));
    }
}
