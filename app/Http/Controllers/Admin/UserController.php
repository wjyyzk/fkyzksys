<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;

//  バリデータ
use App\Http\Requests;
use App\Http\Requests\Admin\UserRequest;

//  データベース
use App\User;

/*
 *  【管理コントローラ】ユーザー
 */
class UserController extends MasterAdmin
{
    /**
     * 一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  ユーザーリストを取得する
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('admin/user/index')->with('users', $users);
    }

    /**
     * 作成画面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user/create');
    }

    /**
     * 登録処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //  ユーザーを作成する
        User::create($request->all());

        //  メッセージ
        Session::flash('message', 'データを作成しました。');

        return redirect('/admin/user/index');
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

        return view('admin/user/edit')->with('user', $model);
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
        $model = User::findOrFail($id);

        //  データを削除する
        $model->delete();

        //  メッセージ
        Session::flash('message', 'データを更新しました。');

        //  保存したURLに移動する
        return redirect(Session::get('requestReferrer'));
    }
}