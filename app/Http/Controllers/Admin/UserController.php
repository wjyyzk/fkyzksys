<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;

//  バリデータ
use App\Http\Requests;
use App\Http\Requests\Admin\UserRequest;

//  データベース
use App\Models\User;
use App\Models\Masters\M_Role;

/*
 *  【管理コントローラ】ユーザー
 */
class UserController extends MasterAdmin
{
    //  レクエスト
    private function setInput($request)
    {
        return array(
            'username'  =>  $request->username,
            'role'      =>  $request->role,
            'password'  =>  bcrypt($request->password)
        );
    }

    /**
     * 一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  管理レベルを取得する
        $m_roles = (new M_Role)
        			->attributes();

        $m_roles = array_prepend($m_roles, '全て');

        //  ユーザーリストを取得する
        $users = User::filter();

        //  ページを移動するため
        if (\Request::ajax()) {
            return \Response::json(view('admin/user/list')
                ->with('m_roles', $m_roles)
                ->with('users', $users)
                ->render());
        }

        return view('admin/user/index')
            ->with('m_roles', $m_roles)
            ->with('users', $users);
    }

    /**
     * 作成画面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  管理レベルを取得する
        $m_roles = (new M_Role)->attributes();

        return view('admin/user/create')
            ->with('m_roles', $m_roles);
    }

    /**
     * 登録処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //  レクエストを取得
        $input = $this->setInput($request);

        //  ユーザーを作成する
        User::create($input);

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
        //  モデルを取得する
        $model = User::findOrFail($id);

        //  前回URLを保存する
        Session::put('requestReferrer', app('url')->previous());

        //  管理レベルを取得する
        $m_roles = (new M_Role)->attributes();

        return view('admin/user/edit')
            ->with('m_roles', $m_roles)
            ->with('model', $model);
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