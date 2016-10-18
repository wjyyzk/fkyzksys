<?php

namespace App;

use Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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
	 *	検索
	 *
	 *	@return Storage List
	 */
	public function scopeFilter()
	{
		$models = Storage::query();

		//	検索
		if(Request::has('sHinban'))
			$models->where('hinban', 'like', '%'.Request::get('sHinban').'%');

		if(Request::has('sAF'))
			$models->where('af', '=', 1);

		if(Request::has('sCF'))
			$models->where('cf', '=', 1);

		if(Request::has('sOther'))
			$models->where('other', '=', 1);

		if(Request::has('sChikouguhinban'))
			$models->where('chikouguhinban', 'like', '%'.Request::get('sChikouguhinban').'%');

		if(Request::has('sGyousha'))
			$models->where('gyousha', 'like', '%'.Request::get('sGyousha').'%');

		$models = $models->orderBy('id', 'desc')->paginate(10);

		return $models;
	}

	/**
	 *	合計金額
	 *
	 *	@return int
	 */
	public function scopeTotalFee()
	{
		$price_total_in = DB::table('storage')
				->join('T_storage_in', 'storage.id', '=', 'T_storage_in.storage_id')
				->select(DB::raw('SUM(unit_price*T_storage_in.stock) as total'))
				->where('deleted_at', '=', null)
				->first();

		$price_total_out = DB::table('storage')
				->join('T_storage_out', 'storage.id', '=', 'T_storage_out.storage_id')
				->select(DB::raw('SUM(unit_price*T_storage_out.stock) as total'))
				->where('deleted_at', '=', null)
				->first();

		return $price_total_in->total - $price_total_out->total;
	}
}