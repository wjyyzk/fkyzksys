<?php

namespace App\Models;

use Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HistorySeppen extends Model
{
	//  テーブル名
	protected $table = "T_history_seppen";

    //  TimeStamps無効にする
    public $timestamps = false;

	/**
	 *	項目
	 *
	 *	@var array
	 */
	protected $fillable = [
        'storage_id',
		'comment'
	];

    /**
     *  在庫リストテーブルの関連
     */
    public function storage()
    {
        return $this->belongsTo('App\Models\Storage');
    }

    /**
     *  検索
     *
     *  @return HistorySeppen List
     */
    public function scopeFilter($id, $storage_id)
    {
        $models = HistorySeppen::query();
        
        $models->where('storage_id', '=', $storage_id);

        $models = $models->orderBy('id', 'desc')->paginate(10);

        return $models;
    }
}
