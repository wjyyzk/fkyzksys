<?php

namespace App\Http\Controllers\Site;

use Session;

//  バリデータ
use App\Http\Requests\StockInRequest;

//  モデル
use App\StorageIn;
use App\M_Hinban_Type;

/**
 *	【コントローラ】入庫
 */
class StorageInController extends MasterSite
{
    private $list_hinban_types;

    //  コンストラクタ
    public function __construct() {
        //  マスタを取得する
        //  品種
        $this->list_hinban_types = (new M_Hinban_Type)->attributes();
    }

    /**
     *  レクエスト
     *  @param          入力フォーム
     *  @return         
     */
    private function setInput($request)
    {
        return array(
            'storage_id'    =>  $request->id,
            'hinban_type'   =>  $request->hinban_type,
            'stock'         =>  $request->stock,
            'date'          =>  date('Y-m-d'),
            'time'          =>  date('H:i:s')
        );
    }

    /**
     *  出庫入力画面
     *  @return view
     */
    public function create()
    {
        return view('site/storage/in/create')
                ->with('list_hinban_types', $this->list_hinban_types);
    }

    /**
     *  出庫入力処理
	 *	@param request
	 *	@return view
	 */
	public function store(StockInRequest $request)
    {
        $input = $this->setInput($request);

        //  モデルを登録する
        StorageIn::create($input);

        //  メッセージ
        Session::flash('message', 'データを登録しました。');

        return redirect('/storage/in/create');
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
        $model = StorageIn::with('storage')->findOrFail($id);

        return view('site/storage/in/edit')
            ->with('list_hinban_types', $this->list_hinban_types)
            ->with('model', $model);
    }

    /**
     * 更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StockInRequest $request, $id)
    {
        //  モデルを取得する
        $model = StorageIn::findOrFail($id);

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
        $model = StorageIn::findOrFail($id);

        //  データを削除する
        $model->delete();

        //  メッセージ
        Session::flash('message', 'データを削除しました。');

        //  保存したURLに移動する
        return redirect(Session::get('requestReferrer'));
    }
}
