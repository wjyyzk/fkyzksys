<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StorageOut extends Model
{
	//  テーブル名
	protected $table = "T_storage_out";

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
}
