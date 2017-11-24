<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *	【マスタ】品種
 */
class M_Hinban_Type extends Model
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
            '1'		=>  '新品',
            '2'		=>  '中古'
        ];
    }
}
