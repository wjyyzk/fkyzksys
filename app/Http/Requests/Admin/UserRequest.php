<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

/**
 *  【リクエスト】ユーザー
 */
class UserRequest extends Request
{
    /**
     * フィールド名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'username'          =>  'ユーザー',
            'role'              =>  '管理レベル',
            'password'          =>  'パスワード',
            'password_conf'     =>  'パスワード確認',
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
    	//	作成の時NULL、編集の時IDを取得
    	$id = $this->route('user');

        return [
            'username'      =>  'required|max:20|unique:users,username,'.$id,
            'role'          =>  'required',            
            'password'      =>  'required|max:10|same:password_conf',
            'password_conf' =>  'required|max:10|same:password',
        ];
    }
}