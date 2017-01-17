<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *	【マスタ】入出庫種類
 */
class M_Type extends Model
{
    /**
     * アイテム
     *
     * @return array
     */
    public function attributes()
    {
        return [
            '0'		=>	'全',
            '1'		=>  '入庫',
            '2'		=>  '出庫'
        ];
    }
}
