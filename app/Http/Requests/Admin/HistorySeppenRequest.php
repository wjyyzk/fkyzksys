<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

/**
 *  【リクエスト】設変履歴
 */
class HistorySeppenRequest extends Request
{
    /**
     * フィールド名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'comment'       =>  'コメント'
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
            'comment'       =>  'required|max:255'
        ];
    }
}
