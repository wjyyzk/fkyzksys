<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;

//  バリデータ
use App\Http\Requests;
use App\Http\Requests\Admin\PICRequest;

//  モデル
use App\PIC;

/**
 *  【管理コントローラ】担当者
 */
class PICController extends MasterAdmin
{
    //  レクエスト
    private function setInput($request)
    {
        return array(
            'name'          =>  $request->name,
            'furigana'      =>  $request->furigana
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  モデルを取得する
        $models = PIC::filter();

        return view('admin/pic/index')
            ->with('models', $models);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pic/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PICRequest $request)
    {
        //  レクエストを取得
        $input = $this->setInput($request);

        //  ユーザーを作成する
        PIC::create($input);

        //  メッセージ
        Session::flash('message', 'データを作成しました。');

        return redirect('/admin/pic/index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //  前回URLを保存する
        Session::put('requestReferrer', app('url')->previous());

        //  モデルを取得する
        $model = PIC::findOrFail($id);

        return view('admin/pic/edit')->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PICRequest $request, $id)
    {
        //  モデルを取得する
        $model = PIC::findOrFail($id);

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  前回URLを保存する
        Session::put('requestReferrer', app('url')->previous());

        //  モデルを取得する
        $model = PIC::findOrFail($id);

        //  データを削除する
        $model->delete();

        //  メッセージ
        Session::flash('message', 'データを削除しました。');

        //  保存したURLに移動する
        return redirect(Session::get('requestReferrer'));
    }
}
