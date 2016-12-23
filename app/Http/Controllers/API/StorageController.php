<?php

namespace App\Http\Controllers\API;

//  モデル
use App\Storage;

/**
 *  【API】
 */
class StorageController extends MasterAPI
{
    public function ts()
    {
        return response()->json([
            'status'            => false
        ]);        
    }

    /**
     *  モデル【storage】を取得する
     *  @return json
     */
    public function index($id)
    {
        //  モデルを取得する
    	$model = Storage::find($id);

        if($model != null)
        {
            //  モデルがある場合
            return response()->json([
                'status'            => true,
                'id'                => $id,
                'hinban'            => $model->hinban,
                'chikouguhinban'    => $model->chikouguhinban,
                'stock'             => $model->stock_in - $model->stock_out
            ]);
        }
        else
        {
            //  モデルが無い場合
            return response()->json([
                'status'            => false
            ]);
        }
    }
}