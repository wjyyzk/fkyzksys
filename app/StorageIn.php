<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *	【モデル】入庫
 */
class StorageIn extends Model
{
	//  テーブル名
	protected $table = "T_storage_in";

	//	TimeStamps無効にする
	public $timestamps = false;

	/**
	 *	項目
	 *
	 *	@var array
	 */
	protected $fillable = [
		'storage_id',
		'date',
		'time',
		'stock'		
	];

	/**
	 *	在庫テーブルの関連
	 */
	public function storage()
	{
		return $this->belongsTo('App\Storage');
	}

	/**
	 *	モデルを取得する
	 *	@param 		input
	 *	@return 	model 
	 */
	public function scopeItem($query, $input)
	{
		$model = StorageIn::where('date', '=', $input['date'])
				->where('time', '=', $input['time'])
				->where('storage_id', '=', $input['storage_id'])
				->first();

		return null;
	}
}