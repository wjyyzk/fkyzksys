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
	 *	出庫テーブルの関連
	 */
	public function storage_out()
	{
		return $this->hasMany('App\StorageOut');
	}

	/**
	 *	検索
	 *
	 *	@return Storage List
	 */
	public function scopeFilter()
	{
    	$models = Storage::query();

        //  検索
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
		return DB::table('storage')
				->select(DB::raw('SUM(1*unit_price) as total'))
				->where('deleted_at', '=', null)
				->first();
	}
}