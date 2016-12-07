<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Storage;
use App\StorageIn;

//	【API】インポート
class ImportController extends Controller
{
	//	エンコードの変換
    private function convertJpnChar($data)
    {
    	return mb_convert_encoding($data, "UTF-8", 'sjis-win');
    }

	//	自動でデータを登録する
    public function index()
    {
    	if (($handle = fopen(public_path()."/upload/T_Result.csv", "r")) !== FALSE) {
		    //	30フィールドまで可能
		    while (($data = fgetcsv($handle, 30, ",")) !== FALSE) {

		    	try{
			    	DB::beginTransaction();

		        	$input = array(
			            'hinban'            =>  $data[1],
			            'seppenfugou'       =>  $data[2],
			            'name'              =>  $data[3],
			            'tanaban'           =>  $data[4],
			            'af'                =>  $data[5] ? true : false,
			            'cf'                =>  $data[6] ? true : false,
			            'other'             =>  $data[7] ? true : false,
			            'chikouguhinban'    =>  $data[8],
			            'zuuban'            =>  $data[9],
			            'gyousha'           =>  $data[10],
			            'unit_price'        =>  $data[11],
			            'shashu'            =>  $data[12],
			            'bui'               =>  $data[13],
			            'lock'              =>  $data[14],
			            'comment'           =>  $data[15],
			            'pic'               =>  $data[16],
			            'whq'               =>  $data[17]
		        	);

		        	//	在庫リストデータを追加する
		        	$model = Storage::create($input);

		        	//	入庫データを追加する
		        	if($data[18] > 0)
		        	{
		        		$childInput = array(
		        			'storage_id'	=>	$model->id,
		        			'date'			=>	date('Y-m-d'),
		        			'time'			=>	date('H:i:s'),
		        			'stock'			=>	$data[18]
		        		);

		        		StorageIn::create($childInput);
		        	}
		    	}
		    	catch(\Exception $e)
		    	{
		    		DB::rollback();
		    	}
		    	finally
		    	{
		    		DB::commit();
		    	}
		    }
		    fclose($handle);
		}

    	return "自動更新が完了しました。";
    }
}
