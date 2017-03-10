<?php

namespace App\Http\Controllers\API;

//  モデル
use App\Storage;

/**
 *  【API】在庫リスト
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

    /**
     *  モデル【storage】の最終データを取得する
     *  @return json
     */
    public function last()
    {
        $model = Storage::all()->last();

        if($model != null)
        {
            //  モデルがある場合
            return response()->json([
                'status'            => true,
                'hinban'            => $model->hinban,
                'seppenfugou'       => $model->seppenfugou,
                'name'              => $model->name,
                'tanaban'           => $model->tanaban,
                'af'                => $model->af,
                'cf'                => $model->cf,
                'other'             => $model->other,
                'chikouguhinban'    => $model->chikouguhinban,
                'zuuban'            => $model->zuuban,
                'gyousha'           => $model->gyousha,
                'unit_price'        => $model->unit_price,
                'shashu'            => $model->shashu,
                'bui'               => $model->bui,
                'lock'              => $model->lock,
                'comment'           => $model->comment,
                'pic'               => $model->pic,
                'whq'               => $model->whq
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