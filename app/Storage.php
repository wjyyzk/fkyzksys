<?php

namespace App;

use Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 *	【モデル】在庫
 */
class Storage extends Model
{
	//  テーブル名
	protected $table = "storage";
	use SoftDeletes;

	/**
	 *	項目
	 *
	 *	@var array
	 */
	protected $fillable = [
		'hinban',
		'seppenfugou',
		'name',
		'tanaban',
		'af',
		'cf',
		'other',
		'chikouguhinban',
		'zuuban',
		'gyousha',
		'unit_price',
		'shashu',
		'bui',
		'lock',
		'comment',
		'pic',
		'whq',
		'file1',
		'file2'
	];

	/**
	 *	日付 
	 *
	 *	@var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 *	業者テーブルの関連
	 */
	public function merchant()
	{
		return $this->belongsTo('App\Merchant', 'gyousha');
	}	

	/**
	 *	担当者テーブルの関連
	 */
	public function picharge()
	{
		return $this->belongsTo('App\PIC', 'pic');
	}

	/**
	 *	設変履歴テーブルの関連
	 */
	public function history_seppen()
	{
		return $this->hasMany('App\HistorySeppen');
	}

	/**
	 *	入庫テーブルの関連
	 */
	public function storage_in()
	{
		return $this->hasMany('App\StorageIn');
	}

	/**
	 *	入庫数を取得する
	 */
	public function stockIn()
	{
		return $this->hasOne('App\StorageIn')
				->selectRaw('storage_id, sum(stock) as stock_in')
				->where('hinban_type', '=', 1)
				->groupBy('storage_id');
	}

	/**
	 *	入庫数Attributeを作成する
	 */
	public function getStockInAttribute()
	{
		if (!array_key_exists('stockIn', $this->relations))
		{
			$this->load('stockIn');
		}

		$relation = $this->getRelation('stockIn');

		return ($relation) ? (int)$relation->stock_in : 0;
	}

	/**
	 *	【中古】入庫数を取得する
	 */
	public function oldStockIn()
	{
		return $this->hasOne('App\StorageIn')
				->selectRaw('storage_id, sum(stock) as old_stock_in')
				->where('hinban_type', '=', 2)
				->groupBy('storage_id');
	}

	/**
	 *	【中古】入庫数Attributeを作成する
	 */
	public function getOldStockInAttribute()
	{
		if (!array_key_exists('oldStockIn', $this->relations))
		{
			$this->load('oldStockIn');
		}

		$relation = $this->getRelation('oldStockIn');

		return ($relation) ? (int)$relation->old_stock_in : 0;
	}

	/**
	 *	出庫テーブルの関連
	 */
	public function storage_out()
	{
		return $this->hasMany('App\StorageOut');
	}

	/**
	 *	出庫数を取得する
	 */
	public function stockOut()
	{
		return $this->hasOne('App\StorageOut')
				->selectRaw('storage_id, sum(stock) as stock_out')
				->where('hinban_type', '=', 1)
				->groupBy('storage_id');
	}

	/**
	 *	出庫数Attributeを作成する
	 */
	public function getStockOutAttribute()
	{
		if (!array_key_exists('stockOut', $this->relations))
		{
			$this->load('stockOut');
		}

		$relation = $this->getRelation('stockOut');

		return ($relation) ? (int)$relation->stock_out : 0;
	}

	/**
	 *	【中古】出庫数を取得する
	 */
	public function oldStockOut()
	{
		return $this->hasOne('App\StorageOut')
				->selectRaw('storage_id, sum(stock) as old_stock_out')
				->where('hinban_type', '=', 2)
				->groupBy('storage_id');
	}

	/**
	 *	【中古】出庫数Attributeを作成する
	 */
	public function getOldStockOutAttribute()
	{
		if (!array_key_exists('oldStockOut', $this->relations))
		{
			$this->load('oldStockOut');
		}

		$relation = $this->getRelation('oldStockOut');

		return ($relation) ? (int)$relation->old_stock_out : 0;
	}

	/**
	 *	検索
	 *	@param 	query 	【Laravel】デフォールト
	 *	@param 	page　	ページ
	 *
	 *	@return Storage List
	 */
	public function scopeFilter($query, $page = TRUE)
	{
		$models = Storage::query();

		//	品番
		if(Request::has('sHinban'))
			$models->where('hinban', 'like', '%'.Request::get('sHinban').'%');

		//	治工具品番
		if(Request::has('sChikouguhinban'))
			$models->where('chikouguhinban', 'like', '%'.Request::get('sChikouguhinban').'%');

		//	品名
		if(Request::has('sName'))
			$models->where('name', 'like', '%'.Request::get('sName').'%');

		//	A/F
		if(Request::has('sAF'))
			$models->where('af', '=', 1);

		//	C/F
		if(Request::has('sCF'))
			$models->where('cf', '=', 1);

		//	その他
		if(Request::has('sOther'))
			$models->where('other', '=', 1);

		//	業者
		if(Request::has('sGyousha') && Request::get('sGyousha') > 0)
			$models->where('gyousha', '=', Request::get('sGyousha'));

		//	車種
		if(Request::has('sShashu'))
			$models->where('shashu', 'like', '%'.Request::get('sShashu').'%');

		//	並び順、ページ
		if(Request::has('sOrder'))
			$models = $models->orderBy(Request::get('sOrder'), 'asc');
		else
			$models = $models->orderBy('hinban', 'asc');

		if ($page)
			$models = $models->paginate(10);
		else
			$models = $models->get();

		return $models;
	}

	/**
	 *	在庫数の総合計
	 *
	 *	@return int
	 */
	public function getTotalCount()
	{
		//	入庫のデータをまとめる
		$in = DB::table('storage')
			->join('T_storage_in', 'storage.id', '=', 'T_storage_in.storage_id')
			->select(DB::raw('SUM(T_storage_in.stock) as total'))
			->where('deleted_at', '=', null)
			->where('hinban_type', '=', 1)
			->first()->total;

		if($in == null)
			$in = 0;

		//	出庫のデータをまとめる
		$out = DB::table('storage')
			->join('T_storage_out', 'storage.id', '=', 'T_storage_out.storage_id')
			->select(DB::raw('SUM(T_storage_out.stock) as total'))
			->where('deleted_at', '=', null)
			->where('hinban_type', '=', 1)
			->first()->total;

		if($out == null)
			$out = 0;

		return $in - $out;
	}

	/**
	 *	合計金額
	 *
	 *	@return int
	 */
	public function getTotalFee()
	{
		//	入庫のデータをまとめる
		$in = DB::table('storage')
			->join('T_storage_in', 'storage.id', '=', 'T_storage_in.storage_id')
			->select(DB::raw('SUM(unit_price*T_storage_in.stock) as total'))
			->where('deleted_at', '=', null)
			->where('hinban_type', '=', 1)
			->first()->total;

		if($in == null)
			$in = 0;

		//	出庫のデータをまとめる
		$out = DB::table('storage')
			->join('T_storage_out', 'storage.id', '=', 'T_storage_out.storage_id')
			->select(DB::raw('SUM(unit_price*T_storage_out.stock) as total'))
			->where('deleted_at', '=', null)
			->where('hinban_type', '=', 1)
			->first()->total;

		if($out == null)
			$out = 0;

		return $in - $out;
	}
}