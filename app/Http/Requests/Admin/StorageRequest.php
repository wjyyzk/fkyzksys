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
        //  PrimaryKeyの確認用
        $hinban = Request::get('hinban');
        $chikouguhinban = Request::get('chikouguhinban');

        return [
            'hinban'            =>  'required|max:50|unique:storage,hinban,'.$id.
                                    ',id,chikouguhinban,'.$chikouguhinban,
            'seppenfugou'       =>  'max:10',
            'name'              =>  'max:100',
            'tanaban'           =>  'max:100',
            'af'                =>  '',
            'cf'                =>  '',
            'other'             =>  '',
            'chikouguhinban'    =>  'alpha_num|max:50|unique:storage,chikouguhinban,'.
                                    $id.',id,hinban,'.$hinban,
            'zuuban'            =>  'max:20',
            'gyousha'           =>  'max:20',
            'unit_price'        =>  'numeric',
            'shashu'            =>  'max:20',
            'bui'               =>  'max:20',
            'lock'              =>  'max:20',
            'comment'           =>  'max:255',
            'pic'               =>  'max:50',
            'whq'               =>  'max:10',
            'file1'             =>  'max:4000',
            'file2'             =>  'max:4000'
        ];
    }
}
