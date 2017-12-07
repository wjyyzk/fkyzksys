<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Input;
use App\Library\ExportExcelLib;

//  バリデータ
use App\Http\Requests;
use App\Http\Requests\Admin\MerchantRequest;

//  モデル
use App\Models\Merchant;

/**
 *  【管理コントローラ】業者
 */
class MerchantController extends MasterAdmin
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
        //  エクセルを出力する
        if (Input::get('excel'))
        {
            $models = Merchant::filter(FALSE);
            
            $export = new ExportExcelLib($models);
            $export->exportGyousha();
        }

        //  モデルを取得する
        $models = Merchant::filter();

        //  ページを移動するため
        if (\Request::ajax()) {
            return \Response::json(view('admin/merchant/list')
                ->with('models', $models)
                ->render());
        }

        return view('admin/merchant/index')->with('models', $models);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/merchant/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MerchantRequest $request)
    {
        //  レクエストを取得
        $input = $this->setInput($request);

        //  ユーザーを作成する
        Merchant::create($input);

        //  メッセージ
        Session::flash('message', 'データを作成しました。');

        return redirect('/admin/merchant/index');
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
        $model = Merchant::findOrFail($id);

        return view('admin/merchant/edit')->with('model', $model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MerchantRequest $request, $id)
    {
        //  モデルを取得する
        $model = Merchant::findOrFail($id);

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
        $model = Merchant::findOrFail($id);

        //  データを削除する
        $model->delete();

        //  メッセージ
        Session::flash('message', 'データを削除しました。');

        //  保存したURLに移動する
        return redirect(Session::get('requestReferrer'));
    }
}
