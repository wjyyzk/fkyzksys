<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

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
            'seppenfuou'        =>  '設変符号',
            'name'              =>  '品名',
            'af'                =>  'A/F',
            'cf'                =>  'C/F',
            'other'             =>  'その他',
            'chikouguhinban'    =>  '治工具品番',
            'zuuban'            =>  '図番',
            'gyousha'           =>  '業者',
            'unit_price'        =>  '単価',
            'stock'             =>  '在庫数',
            'stock_secondhand'  =>  '中古品',
            'shashu'            =>  '車種',
            'bui'               =>  '部位',
            'lock'              =>  'ロック方向',
            'comment'           =>  '備考',
            'pic'               =>  '担当',
            'file1'             =>  'ファイル1',
            'file2'             =>  'ファイル2'
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
            'hinban'            =>  'required|unique:storage,hinban,'.$id,
            'seppenfuou'        =>  '',
            'name'              =>  '',
            'af'                =>  '',
            'cf'                =>  '',
            'other'             =>  '',
            'chikouguhinban'    =>  'alpha_num',
            'zuuban'            =>  '',
            'gyousha'           =>  '',
            'unit_price'        =>  'numeric',
            'stock'             =>  'numeric',
            'stock_secondhand'  =>  'numeric',
            'shashu'            =>  '',
            'bui'               =>  '',
            'lock'              =>  '',
            'comment'           =>  '',
            'pic'               =>  '',
            'file1'             =>  'max:4000',
            'file2'             =>  'max:4000'
        ];
    }
}
