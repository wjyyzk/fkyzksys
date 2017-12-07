<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

//  バリデータ
use App\Http\Requests;
use App\Models\StorageIn;
use App\Models\StorageOut;

/**
 *  【コントローラ】アップロード
 */
class HTUploadController extends MasterSite
{
    /**
     *  レクエスト
     *  @param          CSVデータ
     *  @return
     */
    private function setInput($request)
    {
        return array(
            'date'          =>  $request[0],
            'time'          =>  $request[1],
            'storage_id'    =>  $request[2],
            'hinban_type'   =>  $request[5],
            'stock'         =>  $request[6]
        );
    }

    /**
     *  画面表示        GET
     *  @return view
     */
    public function index()
    {
        return view('site/ht/index');
    }

    /**
     *  アップロード処理    POST
     *  @param request
     *  @return view
     */
	public function store(Request $request)
    {
        try
        {
            DB::beginTransaction();

            //  アプロードファイルを確認する
            if($request->hasFile('file_stockin'))
            {
                $inName = $request->file('file_stockin')->getClientOriginalName();
                if(ends_with($inName, "入庫.csv"))
                {
                    $fName = 'file_stockin.csv';
                    $request->file_stockin->move('upload/', $fName);
                    //  入庫データを処理する
                    $this->updateCSV("stockin");

                    //  メッセージ
                    Session::flash('message_in', '入庫データに'.$inName.'を更新しました。');
                }
                else
                {
                    //  メッセージ
                    Session::flash('warning_in', '入庫ファイルが正しくありません。'.$inName.'をもう一度確認して下さい。');
                }
            }

            //  アプロードファイルを確認する
            if($request->hasFile('file_stockout'))
            {
                $outName = $request->file('file_stockout')->getClientOriginalName();
                if(ends_with($outName, "出庫.csv"))
                {
                    $fName = 'file_stockout.csv';
                    $request->file_stockout->move('upload/', $fName);
                    //  出庫データを処理する
                    $this->updateCSV("stockout");

                    //  メッセージ
                    Session::flash('message_out', '出庫データに'.$outName.'を更新しました。');
                }
                else
                {
                    //  メッセージ
                    Session::flash('warning_out', '出庫ファイルが正しくありません。'.$outName.'をもう一度確認して下さい。');
                }
            }
        }
        catch(\Exception $e)
        {
            DB::rollback();

            //  エラーメッセージ
            Session::flash('warning', $e->getMessage());
        }
        finally
        {
            DB::commit();
        }

        return redirect('ht/upload');
    }

    /**
     *  CSVデータを更新する
     *  @param  type　       //　 タイプ
     *  @return nothing
     */
    private function updateCSV($type)
    {
    	//	ファイルを開く
        if($type == "stockin")
        {
            $handle = fopen(public_path()."/upload/file_stockin.csv", "r");
        }
        else if($type == "stockout")
        {
            $handle = fopen(public_path()."/upload/file_stockout.csv", "r");
        }
        else
        {
            return;
        }

        //  入庫
        if ($type == "stockin")
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

				//  CSVデータを取得する
                $input = $this->setInput($data);

                $model = StorageIn::item($input)->first();

                if($model === null) {
                    //  入庫データを作成する
                    StorageIn::create($input);
                }
                else
                {
                    //  既存データを更新する
                    $model->fill($input)->save();
                }
            }
        }
        //  出庫
        else if($type == "stockout")
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                //  CSVデータを取得する
                $input = $this->setInput($data);

                $model = StorageOut::item($input)->first();

                if($model === null) {
                    //  入庫データを作成する
                    StorageOut::create($input);
                }
                else
                {
                    //  既存データを更新する
                    $model->fill($input)->save();
                }
            }
        }

        //  メモリを開放する
        fclose($handle);
    }
}