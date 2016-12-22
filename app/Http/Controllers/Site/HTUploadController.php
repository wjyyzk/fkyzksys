<?php

namespace App\Http\Controllers\Site;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests;
use App\StorageIn;
use App\StorageOut;

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
            'stock'         =>  $request[5]
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
                $fName = 'file_stockin.csv';
                $request->file_stockin->move('upload/', $fName);
                //  入庫データを処理する
                $this->updateCSV("stockin");

                //  メッセージ
                Session::flash('message', 'データを更新しました。');
            }

            //  アプロードファイルを確認する
            if($request->hasFile('file_stockout'))
            {
                $fName = 'file_stockout.csv';
                $request->file_stockout->move('upload/', $fName);
                //  出庫データを処理する
                $this->updateCSV("stockout");

                //  メッセージ
                Session::flash('message', 'データを更新しました。');
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

                $model = StorageIn::item($input);

                if($model === null) {
                    //  入庫データを作成する
                    StorageIn::create($input);
                }
                else
                {
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

                $model = StorageOut::item($input);

                if($model === null) {
                    //  入庫データを作成する
                    StorageOut::create($input);
                }
                else
                {
                    $model->fill($input)->save();
                }
            }
        }

        fclose($handle);
    }
}