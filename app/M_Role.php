<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *	【マスタ】ユーザーレベル
 */
class M_Role extends Model
{
    /**
    * アイテム
    *
    * @return array
    */
    public function attributes()
    {
        return [
            'ユーザー'      =>  'ユーザー',
            '管理者'       =>  '管理者',
        ];
    }
}