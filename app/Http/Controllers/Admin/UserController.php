<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

//  バリデータ
use App\Http\Requests;

//  データベース
//use

/*
 *  【管理コントローラ】ユーザー
 */
class UserController extends MasterAdmin
{
    /**
     * ユーザー一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/user/index');
    }

    /**
     * ユーザー作成
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user/create');
    }

    /**
     * データベース登録
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "submit";
    }

    /**
     * ユーザー詳細
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * ユーザー編集
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/user/edit');
    }

    /**
     * データベース更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * ユーザー削除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "destory";
    }
}
