<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

/**
 *  【リクエスト】在庫リスト
 */
class StorageRequest extends Request
{
    /**
     * フィールド名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'hinban'            =>  '品番',
            'seppenfugou'       =>  '設変符号',
            'name'              =>  '品名',
            'tanaban'           =>  '棚番',
            'af'                =>  'A/F',
            'cf'                =>  'C/F',
            'other'             =>  'その他',
            'chikouguhinban'    =>  '治工具品番',
            'zuuban'            =>  '図番',
            'gyousha'           =>  '業者',
            'unit_price'        =>  '単価',
            'stock'             =>  '在庫数',
            'shashu'            =>  '車種',
            'bui'               =>  '部位',
            'lock'              =>  'ロック方向',
            'comment'           =>  '備考',
            'pic'               =>  '担当',
            'whq'               =>  'WHQ単価報告',
            'file1'             =>  '部品図面',
            'file2'             =>  '予備'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //  作成の時NULL、編集の時IDを取得
        $id = $this->route('storage');

        return [
            'hinban'            =>  'required|max:255|unique_with:storage,hinban,chikouguhinban,'.$id,
            'seppenfugou'       =>  'max:10',
            'name'              =>  'max:100',
            'tanaban'           =>  'max:100',
            'af'                =>  '',
            'cf'                =>  '',
            'other'             =>  '',
            'chikouguhinban'    =>  'alpha_num|min:10|max:10|unique_with:storage,hinban,chikouguhinban,'.$id,
            'zuuban'            =>  'max:20',
            'gyousha'           =>  '',
            'unit_price'        =>  'numeric',
            'shashu'            =>  'max:20',
            'bui'               =>  'max:20',
            'lock'              =>  'max:20',
            'comment'           =>  'max:255',
            'pic'               =>  '',
            'whq'               =>  'numeric',
            'file1'             =>  'max:2000',
            'file2'             =>  'max:2000'
        ];
    }

    /**
     *	エラーメッセージ
     */
    public function messages()
    {
    	return [
    		'hinban.unique_with' => '指定の品番と治工具品番は既に使用されています。',
    		'chikouguhinban.unique_with' => '指定の品番と治工具品番は既に使用されています。',
    		'file1.max' => '部品図面は2MB以下にしてください。',
    		'file2.max' => '予備は2MB以下にしてください。'
    	];
    }
}
