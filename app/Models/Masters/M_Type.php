<?php

namespace App\Models\Masters;

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
            '0'		=>	'全て',
            '1'		=>  '入庫',
            '2'		=>  '出庫'
        ];
    }
}
