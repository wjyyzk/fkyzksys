<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

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
            'id'        =>  'required|exists:storage',
            'stock'     =>  'required|numeric'
        ];
    }
}
