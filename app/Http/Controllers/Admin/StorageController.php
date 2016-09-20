<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

//  バリデータ
use App\Http\Requests;

//  データベース
use App\Storage;

/*
 *  【管理コントローラ】在庫リスト
 */
class StorageController extends MasterAdmin
{
    /**
     * 一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  在庫リストを取得する
        $models = Storage::orderBy('id', 'desc')->paginate(10);

        return view('admin/storage/index')->with('models', $models);
    }

    /**
     * 作成画面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/storage/create');
    }

    /**
     * 登録処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  在庫リストを作成する
        Storage::create($request->all());

        //  メッセージ
        Session::flash('message', 'データを作成しました。');

        return redirect('/admin/storage/index');
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
        $model = Storage::findOrFail($id);

        return view('admin/storage/edit')->with('model', $model);
    }

    /**
     * 更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  モデルを取得する
        $model = Storage::findOrFail($id);

        //  データを更新する
        $model->fill($request->all())->save();

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
        $model = Storage::findOrFail($id);

        //  データを削除する
        $model->delete();

        //  メッセージ
        Session::flash('message', 'データを更新しました。');

        //  保存したURLに移動する
        return redirect(Session::get('requestReferrer'));        
    }
}