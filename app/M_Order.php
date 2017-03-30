<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *	【マスタ】並び順
 */
class M_Order extends Model
{
    /**
    * アイテム
    *
    * @return array
    */
    public function attributes()
    {
        return [
            'id'                =>  'ID',
            'hinban'            =>  '品番',
            'chikouguhinban'    =>  '治工具品番'
        ];
    }
}