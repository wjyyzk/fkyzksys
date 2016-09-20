<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Storage extends Model
{
	//  テーブル名
	protected $table = "storage";
	use SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'hinban1', 
		'search_hinban',
		'seppenfugou',
		'name',
		'ac',
		'cf',
		'other',
		'hinban2',
		'zuuban',
		'gyousha',
		'unit_price',
		'stock_curr',
		'stock_prev',
		'shiyougaki',
		'shashu',
		'bui',
		'lock',
		'comment',
		'pic',
	];

	/**
	 * The dates attributes 
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];
}
