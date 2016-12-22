<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Session;

//  バリデータ
use App\Http\Requests;
use App\Http\Requests\Admin\StorageRequest;

//  データベース
use App\Storage;

/**
 *  【管理コントローラ】在庫リスト
 */
class StorageController extends MasterAdmin
{
    //  レクエスト
    private function setInput($request)
    {
        return array(
            'hinban'            =>  $request->hinban,
            'seppenfugou'       =>  $request->seppenfugou,
            'name'              =>  $request->name,
            'tanaban'           =>  $request->tanaban,
            'af'                =>  $request->af ? true : false,
            'cf'                =>  $request->cf ? true : false,
            'other'             =>  $request->other ? true : false,
            'chikouguhinban'    =>  $request->chikouguhinban,
            'zuuban'            =>  $request->zuuban,
            'gyousha'           =>  $request->gyousha,
            'unit_price'        =>  $request->unit_price,
            'shashu'            =>  $request->shashu,
            'bui'               =>  $request->bui,
            'lock'              =>  $request->lock,
            'comment'           =>  $request->comment,
            'pic'               =>  $request->pic,
            'whq'               =>  $request->whq
        );
    }

    /**
     * 一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  モデル
        $storage = new Storage;

        //  在庫リストを取得する
        $models = $storage->Filter();

        //  画面を表示する
        return view('admin/storage/index')
            ->with('models', $models)
            ->with('totalFee', $storage->getTotalFee());
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
    public function store(StorageRequest $request)
    {
        $input = $this->setInput($request);

        try
        {
            DB::beginTransaction();

            //  在庫リストを作成する
            $model = Storage::create($input);

            //  アプロードファイルを確認する
            if($request->hasFile('file1'))
            {
                $fName = 'file2_'.$model->id.'.'.$request->file1->extension();
                $request->file1->move('upload/file1/', $fName);
                $model->file1 = $fName;
            }

            //  アプロードファイルを確認する
            if($request->hasFile('file2'))
            {
                $fName = 'file2_'.$model->id.'.'.$request->file2->extension();
                $request->file2->move('upload/file2/', $fName);
                $model->file2 = $fName;
            }

            //  データを更新する
            $model->save();

            //  メッセージ
            Session::flash('message', 'データを作成しました。');
        }
        catch(\Exception $e)
        {
            DB::rollback();

            //  エラーメッセージ
            Session::flash('warning', 'データ更新が失敗しました。');

            return redirect('admin/storage/create');
        }
        finally
        {
            DB::commit();
        }

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

        //  画面を表示する
        return view('admin/storage/edit')
                ->with('model', $model);
    }

    /**
     * 更新処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorageRequest $request, $id)
    {
        //  モデルを取得する
        $model = Storage::findOrFail($id);

        try
        {
            DB::beginTransaction();

            $input = $this->setInput($request);

            //  アプロードファイルを確認する
            if($request->hasFile('file1'))
            {
                $fName = 'file1_'.$model->id.'.'.$request->file1->extension();
                $request->file1->move('upload/file1/', $fName);
                $input['file1'] = $fName;
            }

            //  アプロードファイルを確認する
            if($request->hasFile('file2'))
            {
                $fName = 'file2_'.$model->id.'.'.$request->file2->extension();
                $request->file2->move('upload/file2/', $fName);
                $input['file2'] = $fName;
            }

            //  データを更新する
            $model->fill($input)->save();

            //  メッセージ
            Session::flash('message', 'データを更新しました。');
        }
        catch(\Exception $e)
        {
            DB::rollback();

            //  エラーメッセージ
            Session::flash('warning', 'データの登録が失敗しました。');
        }
        finally
        {
            DB::commit();
        }

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