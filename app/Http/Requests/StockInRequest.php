<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 *  【リクエスト】入庫
 */
class StockInRequest extends Request
{
    /**
     * フィールド名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'id'        =>  'ID',
            'stock'     =>  '出庫数'
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
        return [
            'id'        =>  'required|exists:storage,id,deleted_at,NULL',
            'stock'     =>  'required|numeric'
        ];
    }
}
