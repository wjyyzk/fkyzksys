<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class PICRequest extends Request
{
    /**
     * フィールド名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'          =>  '担当者',
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
        $id = $this->route('pic');

        return [
            'name'          =>  'required|max:50|unique:pic,name,'.$id
        ];
    }
}
